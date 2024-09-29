function filterFunction() {
    var input, filter, ul, li, i, txttextContent;
    input = document.getElementById("dropdownInput");
    filter = input.textContent.toUpperCase();
    ul = document.getElementById("dropdownMenu");
    li = ul.getElementsByTagName("li");

    ul.style.display = 'block';

    for (i = 0; i < li.length; i++) {
        txttextContent = li[i].textContent || li[i].innerText;
        if (txttextContent.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

window.onload = function () {
    loadProfileData();
};

function loadProfileData() {
    const savedProfileData = JSON.parse(localStorage.getItem('profileData'));

    if (savedProfileData) {
        const isEditPage = window.location.pathname.includes('edit');
        if(isEditPage){
            const nameParts = savedProfileData.fullName.split(' ');
            document.getElementById('firstName').value = nameParts[0];
            document.getElementById('lastName').value = nameParts[1];
            document.getElementById('zipCode').value = savedProfileData.zipCode;
            document.getElementById('age').value = savedProfileData.age;
            document.getElementById('party').value = savedProfileData.registeredParty;
        }else{
            const nameParts = savedProfileData.fullName.split(' ');
            document.getElementById('fullName').textContent = nameParts[0] + " " + nameParts[1];
            document.getElementById('zipCode').textContent = savedProfileData.zipCode;
            document.getElementById('age').textContent = savedProfileData.age;
            document.getElementById('party').textContent = savedProfileData.registeredParty;
        }

        const selectedList = document.getElementById('topIssues');
        selectedList.innerHTML = '';
        savedProfileData.issues.forEach(issue => {
            addToList(issue); 
        });
    }
}

function saveProfile() {
    const existingItems = Array.from(document.querySelectorAll('#topIssues li'));
    const selectedIssues = existingItems
        .map(li => li.firstChild.textContent.trim()); 

    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const zipCode = parseInt(document.getElementById('zipCode').value.trim());
    const age = parseInt(document.getElementById('age').value.trim());
    const registeredParty = document.getElementById('party').value;

    const fullName = `${firstName} ${lastName}`;

    const profileData = {
        fullName: fullName,
        zipCode: zipCode,
        age: age,
        registeredParty: registeredParty,
        issues: selectedIssues
    };

    /*localStorage.setItem('name', JSON.stringify(fullName));
    localStorage.setItem('age', age);
    localStorage.setItem('zip', zip);
    localStorage.setItem('party', JSON.stringify(registeredParty));
    localStorage.setItem('issues', JSON.stringify(selectedIssues));*/
    localStorage.setItem('profileData', JSON.stringify(profileData));
    alert('Profile saved successfully!');
    window.location.href = 'profile.html';
}

function loadIssues() {
    const savedIssues = JSON.parse(localStorage.getItem('profileData')) || [];
    const selectedList = document.getElementById('topIssues');
    selectedList.innerHTML = '';

    savedIssues.forEach(issue => {
        /*const listItem = document.createElement('li');
        listItem.textContent = issue;
        const fullPath = window.location.pathname;
        const fileName = fullPath.substring(fullPath.lastIndexOf('/') + 1);
        if(fileName === "profileedit.html"){
            const removeBtn = document.createElement('button');
            removeBtn.innerText = 'X';
            removeBtn.classList.add('remove-btn');
            removeBtn.onclick = function () {
                selectedList.removeChild(newItem); 
            };
        
            listItem.appendChild(removeBtn);
        }
        selectedList.appendChild(listItem);*/
        addToList(issue);

    });
}

function addToList(issue, removable = false) {
    const selectedList = document.getElementById('topIssues');
    const newItem = document.createElement('li');
    newItem.innerText = issue;

    const isEditPage = window.location.pathname.includes('edit');

    const existingIssues = Array.from(selectedList.querySelectorAll('li')).map(li => {
        return li.childNodes.length > 0 ? li.childNodes[0].textContent.trim() : '';
    });

    if (existingIssues.includes(issue)) {
        alert('This issue is already in the list!');
        return;
    }

    /*const existingItems = Array.from(selectedList.getElementsByTagName("li"));
    const duplicate = existingItems.some(item => item.innerText === issue);
    if (duplicate) {
        
        return;
    }*/

    if (isEditPage) {
        console.log("got here");
        const removeBtn = document.createElement('button');
        removeBtn.innerText = 'X';
        removeBtn.classList.add('remove-btn');
        removeBtn.onclick = function () {
            selectedList.removeChild(newItem);
        };

        newItem.appendChild(removeBtn);
    }

    selectedList.appendChild(newItem);
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

document.addEventListener('click', function (event) {
    const isEditPage = window.location.pathname.includes('edit');
    if(!isEditPage){
        return;
    }
    var isClickInside = document.querySelector('.dropdown-container').contains(event.target);
    if (!isClickInside) {
        document.getElementById("dropdownMenu").style.display = 'none';
    }
});