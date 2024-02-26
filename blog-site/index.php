<?php
ob_start();
include './assets/php/login.php';
include './assets/php/sign_up.php';
include './assets/php/postdb.php';
include './assets/php/update_post_content.php';
include './assets/php/update_post_title.php';
include './assets/php/sort.php';
ob_get_clean();
?>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/main.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen min-w-full flex items-center justify-center bg-mainBg">
    <div class="overflow-x-hidden bg-gray-100">
        <nav class="px-6 py-4 bg-white shadow">
            <div class="container flex flex-col mx-auto md:flex-row md:items-center md:justify-between">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="mr-2 h-6 w-auto" src="./assets/images/logo.png" alt="">
                        <a href="#" class="text-xl font-bold text-gray-800 md:text-2xl">Blog</a>
                    </div>
                </div>
                <div class="flex-col hidden md:flex md:flex-row md:-mx-4 items-center">
                    <a href="#" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Home</a>
                    <a href="#" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Blog</a>
                    <a href="#" class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">About us</a>
                    <?php
                    if (isset($_SESSION['username'])) { ?>
                        <img src="./assets/images/profileImg.png" class="mr-4 max-w-10 rounded-3xl">
                        <a href="./assets/php/logout.php" id="logoutButton">
                            <img src="./assets/images/logout.png" alt="" class="mr-4 max-w-10">
                        </a>
                    <?php } else { ?>
                        <a href="./assets/php/login.php"
                            class="my-1 text-gray-800 hover:text-blue-500 md:mx-4 md:my-0">Login</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <div class="px-6 py-8" style="min-width:1328px">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post</h1>
                        <div>
                            <form method="post" action="index.php" id="sortForm">
                                <label for="sort_option">Sort By:</label>
                                <select name="sort_option" id="sort_option" onchange="submitForm()">
                                    <option value="Latest">Latest</option>
                                    <option value="Categories">Categories</option>
                                </select>
                            </form>
                            <script>
                                function submitForm() {
                                    const selectedOption = document.getElementById("sort_option").value;
                                    localStorage.setItem("sortOption", selectedOption);

                                    // Используйте Fetch API или другие методы для отправки запроса на сервер
                                    // и обновления содержимого страницы в соответствии с выбранным фильтром.
                                    // Пример использования Fetch API:
                                    fetch(`update_posts.php?sort_option=${selectedOption}`, {
                                        method: 'GET',
                                    })
                                        .then(response => response.text())
                                        .then(data => {
                                            // Обновите содержимое страницы с полученными данными.
                                            document.getElementById("post-container").innerHTML = data;
                                        })
                                        .catch(error => console.error('Error:', error));
                                }

                                document.addEventListener("DOMContentLoaded", function () {
                                    const sortOption = localStorage.getItem("sortOption") || "Latest";
                                    document.getElementById("sort_option").value = sortOption;
                                });
                            </script>
                        </div>
                    </div>

                    <!-- publishing posts start -->
                    <?php
                    include './assets/php/public_post.php';
                    ?>
                    <!-- publishing posts end -->

                    <div class="mt-8">
                        <div class="flex">
                            <a href="#"
                                class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                Previous
                            </a>

                            <?php
                            $totalPages = ceil($totalPosts / $postsPerPage);

                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo "<a href='?page=$i' class='px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white'>$i</a>";
                            }
                            ?>

                            <a href="#"
                                class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                        <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                            <ul class="-mx-4">
                                <li class="flex items-center"><img
                                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                        alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                    <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Alex
                                            John</a><span class="text-sm font-light text-gray-700">Created 23
                                            Posts</span></p>
                                </li>
                                <li class="flex items-center mt-6"><img
                                        src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=333&amp;q=80"
                                        alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                    <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Jane
                                            Doe</a><span class="text-sm font-light text-gray-700">Created 52
                                            Posts</span></p>
                                </li>
                                <li class="flex items-center mt-6"><img
                                        src="https://images.unsplash.com/photo-1531251445707-1f000e1e87d0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=281&amp;q=80"
                                        alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                    <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Lisa
                                            Way</a><span class="text-sm font-light text-gray-700">Created 73
                                            Posts</span></p>
                                </li>
                                <li class="flex items-center mt-6"><img
                                        src="https://images.unsplash.com/photo-1500757810556-5d600d9b737d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=735&amp;q=80"
                                        alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                    <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Steve
                                            Matt</a><span class="text-sm font-light text-gray-700">Created 245
                                            Posts</span></p>
                                </li>
                                <li class="flex items-center mt-6"><img
                                        src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=373&amp;q=80"
                                        alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                    <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Khatab
                                            Wedaa</a><span class="text-sm font-light text-gray-700">Created 332
                                            Posts</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <ul>
                                <li><a href="#"
                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                        AWS</a></li>
                                <li class="mt-2"><a href="#"
                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                        Laravel</a></li>
                                <li class="mt-2"><a href="#"
                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                        Vue</a>
                                </li>
                                <li class="mt-2"><a href="#"
                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                        Design</a></li>
                                <li class="flex items-center mt-2"><a href="#"
                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                        Django</a></li>
                                <li class="flex items-center mt-2"><a href="#"
                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                        PHP</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h1>
                        <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">

                            <div class="flex items-center justify-center"><a href="#"
                                    class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                            </div>
                            <div class="mt-4"><a href="#"
                                    class="text-lg font-medium text-gray-700 hover:underline">Build
                                    Your New Idea with Laravel Freamwork.</a></div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center"><img
                                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                        alt="avatar" class="object-cover w-8 h-8 rounded-full"><a href="#"
                                        class="mx-3 text-sm text-gray-700 hover:underline">Alex John</a></div><span
                                    class="text-sm font-light text-gray-600">Jun 1, 2020</span>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Create Post</h1>
                        <div class="flex flex-col max-w-sm px-8 pb-6 pt-2 mx-auto bg-white rounded-lg shadow-md">
                            <div class="mt-4"><a href="#"
                                    class="text-lg font-medium text-gray-700 hover:underline">Create your post for
                                    publication.</a></div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center"><img src="./assets/images/profileImg.png" alt="avatar"
                                        class="object-cover w-8 h-8 rounded-full">
                                    <?php
                                    if (isset($_SESSION['username'])) { ?>
                                        <a href="#" class="mx-3 text-sm text-gray-700 hover:underline">
                                            <?php echo $_SESSION['username']; ?>
                                        </a>
                                        <?php
                                    } else {
                                        echo "You";
                                    }
                                    ?>
                                </div>
                                <div class="flex items-center justify-between"><a href="./assets/php/postdb.php"
                                        class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Create</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-10">
                <h1 class="text-xl pb-10 text-center font-bold text-gray-700 md:text-2xl">Create post</h1>
                <?php
                if (!isset($_SESSION['username'])) { ?>
                    <p class="pb-4 font-bold text-gray-700"><a href="./assets/php/login.php" class="hover:underline">Log
                            in</a> to your account or create one to <a href="./assets/php/sign_up.php"
                            class="hover:underline">create</a> your posts!
                    </p>
                <?php } ?>
                <form method="post" action="./assets/php/postdb.php" onsubmit="return validateForm()">
                    <label for="postTitle" class="block text-gray-700 text-s font-bold mb-2">Post Title:</label>
                    <input type="text" id="postTitle" name="postTitle" class="w-full border rounded-md py-2 px-3 mb-4"
                        placeholder="Enter the title of your post">

                    <label for="postContent" class="block text-gray-700 text-s font-bold mb-2">Post Content:</label>
                    <textarea id="postContent" name="postContent"
                        class="w-full h-52 border rounded-md py-2 px-3 mb-4 resize-y overflow-auto"
                        placeholder="Enter the content of your post"></textarea>
                    <div>
                        <p class="font-bold text-gray-700">Select a category:</p>
                        <select name="categorySelect" id="categorySelect"
                            class="w-44 py-1 px-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            onchange="handleCategoryChange()">
                            <option>HTML/CSS</option>
                            <option>C#</option>
                            <option>Python</option>
                            <option>JavaScript</option>
                            <option>React Native</option>
                            <option>Node.js</option>
                            <option>Angular</option>
                            <option>Vue.js</option>
                            <option>Java</option>
                            <option>PHP</option>
                            <option>Database Management</option>
                            <option>TypeScript</option>
                            <option>Other category</option>
                        </select>
                    </div>
                    <div id="otherCategoryInput" class="hidden">
                        <p class="pt-5 font-bold text-gray-700">Enter other category:</p>
                        <input type="text" id="otherCategory" name="otherCategory" class="rounded-md py-2 px-3"
                            placeholder="Enter other category">
                    </div>
                    <script>
                        function handleCategoryChange() {
                            var selectElement = document.getElementById("categorySelect");
                            var otherCategoryInput = document.getElementById("otherCategoryInput");

                            if (selectElement.value === "Other category") {
                                otherCategoryInput.classList.remove("hidden");
                            } else {
                                otherCategoryInput.classList.add("hidden");
                            }
                        }
                    </script>
                    <div class="flex items-center justify-between pt-10">
                        <button type="submit"
                            class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Create</button>
                    </div>
                </form>
            </div>
        </div>
        <footer class="px-6 py-2 text-gray-100 bg-gray-800">
            <div class="container flex flex-col items-center justify-between mx-auto md:flex-row"><a href="#"
                    class="text-2xl font-bold">Brand</a>
                <p class="mt-2 md:mt-0">All rights reserved 2020.</p>
                <div class="flex mt-4 mb-2 -mx-2 md:mt-0 md:mb-0"><a href="#"
                        class="mx-2 text-gray-100 hover:text-gray-400"><svg viewBox="0 0 512 512"
                            class="w-4 h-4 fill-current">
                            <path
                                d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z">
                            </path>
                        </svg></a><a href="#" class="mx-2 text-gray-100 hover:text-gray-400"><svg viewBox="0 0 512 512"
                            class="w-4 h-4 fill-current">
                            <path
                                d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z">
                            </path>
                        </svg></a><a href="#" class="mx-2 text-gray-100 hover:text-gray-400"><svg viewBox="0 0 512 512"
                            class="w-4 h-4 fill-current">
                            <path
                                d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z">
                            </path>
                        </svg></a>
                </div>
            </div>
        </footer>
    </div>
    <script src="./assets/js/create_post_but.js"></script>
</body>

</html>