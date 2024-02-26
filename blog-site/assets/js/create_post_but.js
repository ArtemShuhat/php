function handleCategoryChange() {
  let selectElement = document.getElementById("categorySelect");
  let otherCategoryInput = document.getElementById("otherCategoryInput");

  if (selectElement.value === "Other category") {
    otherCategoryInput.classList.remove("hidden");
  } else {
    otherCategoryInput.classList.add("hidden");
  }
}

function validateForm() {
  let postTitle = document.getElementById("postTitle").value;
  let postContent = document.getElementById("postContent").value;
  let categorySelect = document.getElementById("categorySelect").value;

  if (
    postTitle.trim() === "" ||
    postContent.trim() === "" ||
    (categorySelect === "Other category" &&
      document.getElementById("otherCategory").value.trim() === "")
  ) {
    alert("Please fill in all required fields.");
    return false;
  }

  return true;
}
