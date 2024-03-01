<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<script src="https://kit.fontawesome.com/dce7fd24f0.js" crossorigin="anonymous"></script>
</head>

<body>
</body>

</html>
<?php
include 'update_post_content.php';
include 'update_post_title.php';
include 'db.php';

$userRole = '';

if (isset($_SESSION['id'])) {
	$userId = $_SESSION['id'];

	$roleQuery = "SELECT role FROM usersdb WHERE id = $userId";
	$roleResult = $mysqli->query($roleQuery);

	if ($roleResult) {
		$roleRow = $roleResult->fetch_assoc();
		$userRole = $roleRow['role'];
	} else {
		die("Error fetching user role: " . $mysqli->error);
	}
}

$countSql = "SELECT COUNT(*) as total FROM posts";
$countResult = $mysqli->query($countSql);

if ($countResult) {
	$countRow = $countResult->fetch_assoc();
	$totalPosts = $countRow['total'];
} else {
	die("Error counting total posts: " . $mysqli->error);
}

$postsPerPage = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $postsPerPage;

$sortOption = isset($_GET['sort_option']) ? $_GET['sort_option'] : 'Latest';

if ($sortOption === 'Latest') {
	$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $offset, $postsPerPage";
} elseif ($sortOption === 'Categories') {
	$sql = "SELECT * FROM posts ORDER BY category ASC LIMIT $offset, $postsPerPage";
} else {
	$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $offset, $postsPerPage";
}

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$postId = $row['post_id'];
		?>
		<div class="mt-6">
			<div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
				<div class="flex items-center justify-between">
					<span class="font-light text-sm text-gray-600">
						<?php echo $row['created_at']; ?>
					</span>
					<a href="#" class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">
						<?php echo $row['category']; ?>
					</a>
				</div>
				<div class="mt-2">
					<div class="title-container">
						<a class="text-2xl font-bold text-gray-700">
							<?php echo $row['title']; ?>
						</a>
						<?php
						if ($userRole === 'admin') {
							?>
							<i class="edit-btn-title text-lime-700 fa-solid fa-pen-to-square" style="position: static;"></i>
							<i class="save-btn-title text-xl text-lime-700 fa-solid fa-check" style="display: none;"></i>
							<?php
						}
						?>
					</div>
					<div class="content-container mt-2">
						<p class="text-gray-600">
							<?php echo $row['content']; ?>
						</p>
						<?php
						if ($userRole === 'admin') {
							?>
							<i class="text-xl text-lime-700 edit-btn-content fa-solid fa-pen-to-square"></i>
							<i class="text-xl text-lime-700 save-btn-content fa-solid fa-check" style="display: none;"></i>
							<?php
						}
						?>
					</div>
				</div>
				<div class="flex items-center justify-between mt-4">
					<a href="error.html" class="text-blue-500 hover:underline">Read more</a>
					<div>
						<a href="#" class="flex items-center">
							<img src="./assets/images/profileImg.png" alt="avatar"
								class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
							<h1 class="font-bold text-gray-700 hover:underline">
								<?php echo $row['creator']; ?>
							</h1>
						</a>
					</div>
				</div>
			</div>
			<script>
				document.addEventListener("DOMContentLoaded", function () {
					var editButtonContent = document.querySelectorAll('.edit-btn-content');
					var saveButtonContent = document.querySelectorAll('.save-btn-content');

					Array.prototype.forEach.call(editButtonContent, function (editButtonContent) {
						editButtonContent.addEventListener('click', function () {
							var contentContainer = this.closest('.content-container');
							var contentParagraph = contentContainer.querySelector('p');
							var editTextareaContent = document.createElement('textarea');
							var originalContent = contentParagraph.textContent;
							var postId = <?php echo json_encode($postId); ?>;

							editTextareaContent.value = originalContent.trim();
							editTextareaContent.classList.add('w-full', 'h-36', 'border', 'rounded-md', 'py-2', 'px-3', 'mb-4', 'resize-y', 'overflow-auto');
							contentContainer.replaceChild(editTextareaContent, contentParagraph);

							editButtonContent.style.display = 'none';
							contentContainer.querySelector('.save-btn-content').style.display = 'inline-block';

							contentContainer.querySelector('.save-btn-content').addEventListener('click', function () {
								var editedContent = editTextareaContent.value;
								savePostContent(postId, editedContent);
							});
						});
					});

					var editButtonTitle = document.querySelectorAll('.edit-btn-title');
					var saveButtonTitle = document.querySelectorAll('.save-btn-title');

					Array.prototype.forEach.call(editButtonTitle, function (editButtonTitle) {
						editButtonTitle.addEventListener('click', function () {
							var titleContainer = this.closest('.title-container');
							var titleParagraph = titleContainer.querySelector('a');
							var editTextareaTitle = document.createElement('textarea');
							var originalTitle = titleParagraph.textContent;
							var postId = <?php echo json_encode($postId); ?>;

							editTextareaTitle.value = originalTitle.trim();
							editTextareaTitle.classList.add('w-full', 'h-12', 'border', 'rounded-md', 'py-2', 'px-3', 'mb-4', 'resize-y', 'overflow-auto');
							titleContainer.replaceChild(editTextareaTitle, titleParagraph);

							editButtonTitle.style.display = 'none';
							titleContainer.querySelector('.save-btn-title').style.display = 'inline-block';

							titleContainer.querySelector('.save-btn-title').addEventListener('click', function () {
								var editedTitle = editTextareaTitle.value;
								savePostTitle(postId, editedTitle);
							});
						});
					});
					document.addEventListener('click', function (event) {
						if (event.target.classList.contains('save-btn-content')) {
							var contentContainer = event.target.closest('.content-container');
							var editTextareaContent = contentContainer.querySelector('textarea');
							var editedContent = editTextareaContent.value.trim();
							var postId = <?php echo json_encode($postId); ?>;

							savePostContent(postId, editedContent);

							contentContainer.innerHTML = "<p class='text-gray-600'>" + editedContent + "</p>";
							contentContainer.querySelector('.edit-btn-content').style.display = 'inline-block';
							contentContainer.querySelector('.save-btn-content').style.display = 'none';
						}

						if (event.target.classList.contains('save-btn-title')) {
							var titleContainer = event.target.closest('.title-container');
							var editTextareaTitle = titleContainer.querySelector('textarea');
							var editedTitle = editTextareaTitle.value.trim();
							var postId = <?php echo json_encode($postId); ?>;

							savePostTitle(postId, editedTitle);
							titleContainer.innerHTML = "<a class='text-2xl font-bold text-gray-700'>" + editedTitle + "</a>";
							titleContainer.querySelector('.edit-btn-title').style.display = 'inline-block';
							titleContainer.querySelector('.save-btn-title').style.display = 'none';
						}
					});

					function savePostContent(postId, editedContent) {
						var formData = new FormData();
						formData.append('post_id', postId);
						formData.append('content', editedContent);

						var xhr = new XMLHttpRequest();
						xhr.open("POST", "assets/php/update_post_content.php", true);
						xhr.onreadystatechange = function () {
							if (xhr.readyState == 4 && xhr.status == 200) {
								console.log(xhr.responseText);
								location.reload();
							}
						};
						xhr.send(formData);
					}

					function savePostTitle(postId, editedTitle) {
						var formData = new FormData();
						formData.append('post_id', postId);
						formData.append('title', editedTitle);

						var xhr = new XMLHttpRequest();
						xhr.open("POST", "assets/php/update_post_title.php", true);
						xhr.onreadystatechange = function () {
							if (xhr.readyState == 4 && xhr.status == 200) {
								console.log(xhr.responseText);
								location.reload();
							}
						};
						xhr.send(formData);
					}
				});
			</script>
		</div>
		<?php
	}
} else {
	echo "No data in the database";
}

$mysqli->close();
?>