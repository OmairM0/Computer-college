// Sidebar Buttons
let allBtns = document.querySelectorAll(".sidebar ul li");
let studentsBtn = document.querySelectorAll(".sidebar ul li")[0];
let subjectsBtn = document.querySelectorAll(".sidebar ul li")[1];
let partsBtn = document.querySelectorAll(".sidebar ul li")[2];
// Content
let allContent = document.querySelectorAll(".content > div");
let studentsContent = document.querySelector(".content .students");
let subjectsContent = document.querySelector(".content .subjects");
let partsContent = document.querySelector(".content .parts");

// -------------

// On Load
window.onload = function () {
  changeActiveLi(studentsBtn);
  changeContent(studentsContent);
  // fillPartOption();
};

// -------------

studentsBtn.onclick = function () {
  changeActiveLi(studentsBtn);
  changeContent(studentsContent);
};
subjectsBtn.onclick = function () {
  changeActiveLi(subjectsBtn);
  changeContent(subjectsContent);
};
partsBtn.onclick = function () {
  changeActiveLi(partsBtn);
  changeContent(partsContent);
};

// Change An Active "Li" When User Click on "Li"
function changeActiveLi(li) {
  //change an active "Li"
  for (let i = 0; i < allBtns.length; i++) {
    allBtns[i].classList.remove("active");
  }
  li.classList.add("active");
}

// Hide All Content And Show the Content Of li that Cliecked
function changeContent(content) {
  for (let i = 0; i < allContent.length; i++) {
    allContent[i].style.display = "none";
  }
  content.style.display = "block";
}

// Show And Hide Sidebar For Small And Medium Screens
let sidebar = document.querySelector(".sidebar");
let sidebarMenuIcon = document.querySelector(".menu-icon");
let overlay = document.querySelector(".overlay");

sidebarMenuIcon.onclick = function () {
  sidebar.classList.add("active");
  overlay.classList.add("active");
};

overlay.onclick = function (e) {
  sidebar.classList.remove("active");
  overlay.classList.remove("active");
};

// Add New Part
let addBtn = document.querySelector(".parts .addBtn");
let backBtn = document.querySelector(".parts .backBtn");
let mainContnetOfParts = document.querySelector(".parts .main-content");
let addPartContent = document.querySelector(".parts .add-part");

// Add
addBtn.onclick = function () {
  mainContnetOfParts.style.display = "none";
  addPartContent.style.display = "block";
  addBtn.style.display = "none";
};

// Back
backBtn.onclick = function () {
  // mainContnetOfParts.style.display = "block";
  // addPartContent.style.display = "none";
  // addBtn.style.display = "block";
  location.reload();
};

// document.forms[0].onsubmit = function (e) {
//   e.preventDefault();
// };

// Save New Part To Database
let saveBtn = document.querySelector(".add-part .saveBtn");

saveBtn.addEventListener("click", addPartToDatabase);

function addPartToDatabase() {
  let url = "../api/addNewPart.php";
  let partName = document.querySelector(".add-part input.name").value;
  let countOfLevels = document.querySelector(
    ".add-part input.countOfLevels"
  ).value;

  if (partName.trim().length < 1) {
    notif("لايمكن ترك الإسم فارغاً.");
  } else if (countOfLevels.trim().length < 1) {
    notif("لايمكن ترك عدد المستويات فارغاً.");
  } else {
    const formData = new FormData();
    formData.append("name", partName);
    formData.append("countOfLevels", countOfLevels);
    fetch(url, { method: "POST", body: formData });

    document.querySelector(".add-part input.name").value = "";
    document.querySelector(".add-part input.countOfLevels").value = "";
    notif("تم إضافة القسم بنجاح");
  }
}

/*--------------------------------- Notification Section -------------------------------------------*/
// Create notification
function notif(text, type = "succs") {
  if (type == "succs") {
    document.querySelector(".notification").style.backgroundColor = "#009688";
  } else if (type == "error") {
    document.querySelector(".notification").style.backgroundColor = "#f44336";
  }
  document.querySelector(".notification").innerText = text;
  setTimeout(() => {
    document.querySelector(".notification").style.right = "0px";
  }, 500);

  setTimeout(() => {
    document.querySelector(".notification").style.right = "-230px";
  }, "2000");
}

// -------------------- Edit Part ------------------ //
let editSaveBtn = document.querySelector(".box .edit .editSaveBtn");

function editPart(x) {
  if (x == 0) {
    event.target.parentElement.parentElement.parentElement.children[1].classList.toggle(
      "show"
    );
  } else {
    event.target.parentElement.classList.toggle("show");
  }
}

// Save Changes When User Make Edit In Parts Info
function saveEdit(id) {
  let url = "../api/editPart.php";
  let partName = event.target.parentElement.children[0].value;
  let countOfLevels = event.target.parentElement.children[1].value;

  if (partName.trim().length < 1) {
    notif("لايمكن ترك الإسم فارغاً.");
  } else if (countOfLevels.trim().length < 1) {
    notif("لايمكن ترك عدد المستويات فارغاً.");
  } else {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("name", partName);
    formData.append("countOfLevels", countOfLevels);
    fetch(url, { method: "POST", body: formData });

    // event.target.parentElement.children[1].value = "";
    // event.target.parentElement.children[1].value = "";
    // createLinks();
    notif("تم تعديل القسم بنجاح");
    setTimeout(() => {
      location.reload();
    }, 2000);
  }
}

// Delete Parts
function deletePart(id) {
  let url = "../api/deletePart.php";

  const formData = new FormData();
  formData.append("id", id);
  fetch(url, { method: "POST", body: formData });

  notif("تم حذف القسم بنجاح", "error");
  setTimeout(() => {
    location.reload();
  }, 2000);
}

// ------------------------------------- Subjects ---------------------------- //
// Add New Subject
let addSubjectBtn = document.querySelector(".subjects .addBtn");
let backSubjectBtn = document.querySelector(".subjects .backBtn");
let mainContnetOfSubjects = document.querySelector(".subjects .main-content");
let addSubjectContent = document.querySelector(".subjects .add-subject");
let partsOption = document.querySelector(".add-subject select[id='part']");
let levlesOption = document.querySelector(".add-subject select[id='level']");

// Add
addSubjectBtn.onclick = function () {
  mainContnetOfSubjects.style.display = "none";
  addSubjectContent.style.display = "block";
  addSubjectBtn.style.display = "none";
  let arrinfo = {};
  fetch("../api/getPartInfo.php", {
    method: "post",
  })
    .then((response) => response.json())
    .then(function (res) {
      arrinfo = res;
      for (let i = 1; i <= Number(arrinfo[0].levels); i++) {
        levlesOption.innerHTML += `<option value=${i}>${i}</option>`;
      }
    });
};

// Back
backSubjectBtn.onclick = function () {
  location.reload();
};

// Get Parts Info For Use Them In 'Add New Subject Section'
partsOption.addEventListener("change", getPartsInfo);

function getPartsInfo() {
  let arrinfo = {};
  fetch("../api/getPartInfo.php", {
    method: "post",
  })
    .then((response) => response.json())
    .then(function (res) {
      arrinfo = res;

      for (let i = 0; i < arrinfo.length; i++) {
        if (arrinfo[i].id == partsOption.value) {
          createOptionsOfLevels(arrinfo[i].levels);
          break;
        }
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

function createOptionsOfLevels(x) {
  levlesOption.innerHTML = "";
  for (let i = 1; i <= parseInt(x); i++) {
    levlesOption.innerHTML += `<option value=${i}>${i}</option>`;
  }
}

// Save New Subject To Database
let saveSubjectBtn = document.querySelector(".add-subject .saveBtn");

saveSubjectBtn.addEventListener("click", addSubjectToDatabase);

function addSubjectToDatabase() {
  let url = "../api/addNewSubject.php";
  let subjectName = document.querySelector(".add-subject input.name").value;
  let partName = partsOption.value;
  let level = levlesOption.value;
  let term = document.querySelector(".add-subject select[id='term']");

  console.log(partName);

  if (subjectName.trim().length < 1) {
    notif("لايمكن ترك الإسم فارغاً.", "error");
  } else {
    const formData = new FormData();
    formData.append("name", subjectName);
    formData.append("part", partName);
    formData.append("level", level);
    formData.append("term", term);
    fetch(url, { method: "POST", body: formData });

    document.querySelector(".add-subject input.name").value = "";
    notif("تم إضافة المادة بنجاح");
  }
}

// ---------------- Edit Subject ----------------
let partsOptionInEdit = document.querySelectorAll(
  ".subjects .edit select[id='part']"
);
let levlesOptionInEdit = document.querySelectorAll(
  ".subjects .edit select[id='level']"
);

// Get Parts Info For Use Them In 'Edit Subject Section'
for (let i = 0; i < partsOptionInEdit.length; i++) {
  partsOptionInEdit[i].addEventListener("change", getPartsInfoInEdit);
}

// ----
function getPartsInfoInEdit() {
  let arrinfo = {};
  let pa = event.target.parentElement.children[4];
  let currentPa = event.target.parentElement.children[2];

  fetch("../api/getPartInfo.php", {
    method: "post",
  })
    .then((response) => response.json())
    .then(function (res) {
      arrinfo = res;

      for (let i = 0; i < arrinfo.length; i++) {
        if (arrinfo[i].id == currentPa.value) {
          createOptionsOfLevelsInEdit(pa, arrinfo[i].levels);
          break;
        }
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}

function createOptionsOfLevelsInEdit(op, x) {
  op.innerHTML = "";
  for (let i = 1; i <= parseInt(x); i++) {
    op.innerHTML += `<option value=${i}>${i}</option>`;
  }
}

let editBtnInSubject = document.querySelectorAll(
  ".subjects .box .fa-pen-to-square"
);

for (let i = 0; i < editBtnInSubject.length; i++) {
  // editBtnInSubject[i].onclick = fillLevel();
  editBtnInSubject[i].addEventListener("click", fillLevel);
}
function fillLevel() {
  let lev =
    event.target.parentElement.parentElement.parentElement.children[1]
      .children[4];
  fetch("../api/getPartInfo.php", {
    method: "post",
  })
    .then((response) => response.json())
    .then(function (res) {
      arrinfo = res;
      createOptionsOfLevelsInEdit(lev, arrinfo[0].levels);
      for (let i = 1; i <= Number(arrinfo[0].levels); i++) {
        // levlesOption.innerHTML += `<option value=${i}>${i}</option>`;
      }
    });
}

// Save Changes When User Make Edit In Parts Info
function saveEditSubject(id) {
  let url = "../api/editSubject.php";
  let subjectName = event.target.parentElement.children[0].value;
  let part = event.target.parentElement.children[2].value;
  let level = event.target.parentElement.children[4].value;
  let term = event.target.parentElement.children[6].value;
  console.log(event.target.parentElement.children);

  if (subjectName.trim().length < 1) {
    notif("لايمكن ترك الإسم فارغاً.");
  } else {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("name", subjectName);
    formData.append("part", part);
    console.log(part);
    formData.append("level", level);
    formData.append("term", term);
    fetch(url, { method: "POST", body: formData });

    notif("تم تعديل المادة بنجاح");
    setTimeout(() => {
      location.reload();
    }, 2000);
  }
}

// Delete Subject
function deleteSubject(id) {
  let url = "../api/deleteSubject.php";

  const formData = new FormData();
  formData.append("id", id);
  fetch(url, { method: "POST", body: formData });

  notif("تم حذف المادة بنجاح", "error");
  setTimeout(() => {
    location.reload();
  }, 2000);
}
