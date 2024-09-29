function filterFunction() {
    var input, filter, ul, li, i, txtValue;
    input = document.getElementById("dropdownInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("dropdownMenu");
    li = ul.getElementsByTagName("li");

    ul.style.display = 'block';

    for (i = 0; i < li.length; i++) {
        txtValue = li[i].textContent || li[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function addIssue(element) {
    var selectedList = document.getElementById("topIssues");
    var itemText = element.innerText;

    var existingItems = selectedList.getElementsByTagName("li");
    for (var i = 0; i < existingItems.length; i++) {
        if (existingItems[i].innerText === itemText) {
            return;
        }
    }

    var newItem = document.createElement("li");
    newItem.innerText = itemText;

    selectedList.appendChild(newItem);
}

document.addEventListener('click', function(event) {
    var isClickInside = document.querySelector('.dropdown-container').contains(event.target);
    if (!isClickInside) {
        document.getElementById("dropdownMenu").style.display = 'none';
    }
});