let select = document.getElementsByName("line_id");
select.forEach((element) => {
  console.log(element);
  element.addEventListener("click", function (e) {
    console.log(e.target.value);
  });
});
