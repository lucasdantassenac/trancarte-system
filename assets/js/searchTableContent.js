function myFunction() {
    // Declare variables
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      let td = tr[i].getElementsByTagName("td");
      for(i2 = 0; i2< td.length; i2++){
        if (td[i2]) {
          txtValue = td[i2].textContent || td[i2].innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
            break
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  }