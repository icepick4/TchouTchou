let table = document.querySelector("table");
let selectType = document.querySelector("#selectType");
let selectStatus = document.querySelector("#selectStatus");
let resetFilter = document.querySelector("#resetFilter");

selectType.addEventListener("change", updateType);
if (selectStatus != null) {
  selectStatus.addEventListener("change", updateStatus);
}
resetFilter.addEventListener("click", reset);

function updateType() {
  for (let i = 0; i < table.children[1].children.length; i++) {
    let row = table.children[1].children[i];
    let type = row.children[0].textContent;
    if (selectType.value == "all" || selectType.value == type) {
      row.classList.remove("hidden");
    } else {
      row.classList.add("hidden");
    }
  }
  updateTable();
}

function updateStatus() {
  for (let i = 0; i < table.children[1].children.length; i++) {
    let row = table.children[1].children[i];
    let status = row.children[4].textContent;
    if (selectStatus.value == "all" || selectStatus.value == status) {
      row.classList.remove("hidden2");
    } else {
      row.classList.add("hidden2");
    }
  }
  updateTable();
}

function updateTable() {
  for (let i = 0; i < table.children[1].children.length; i++) {
    let row = table.children[1].children[i];
    if (row.classList.contains("hidden") || row.classList.contains("hidden2")) {
      row.style.display = "none";
    } else {
      row.style.display = "table-row";
    }
  }
}

function reset() {
  selectType.value = "all";
  selectStatus.value = "all";
  updateType();
  updateStatus();
}
