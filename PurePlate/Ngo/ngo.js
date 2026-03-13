function filterTable(){

var location=document.getElementById("locationFilter").value;

var table=document.getElementById("donationTable");

var rows=table.getElementsByTagName("tr");

for(var i=1;i<rows.length;i++)
{

var cell=rows[i].getElementsByClassName("location")[0];

if(location=="all" || cell.innerHTML==location)
{
rows[i].style.display="";
}
else
{
rows[i].style.display="none";
}

}

}


/* DARK MODE */

function toggleDarkMode(){

document.body.classList.toggle("dark-mode");

}