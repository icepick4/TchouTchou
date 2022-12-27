let table = document.querySelector("table");
let selectType = document.querySelector("#selectType");
let resetFilter = document.querySelector("#resetFilter");

selectType.addEventListener("change", updateType);
resetFilter.addEventListener("click", reset);

function updateType() {
  for (let i = 0; i < table.children[1].children.length; i++) {
    let row = table.children[1].children[i];
    let type = row.children[0].textContent;
    if (type === selectType.value || selectType.value === "all") {
      row.style.display = "table-row";
    } else {
      row.style.display = "none";
    }
  }
}

function reset() {
  selectType.value = "all";
  updateType();
}
