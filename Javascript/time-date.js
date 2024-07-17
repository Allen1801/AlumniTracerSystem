window.onload = setInterval(clock,1000);

function clock()
{
var d = new Date();

var date = d.getDate();

var month = d.getMonth();
var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
month=montharr[month];

var year = d.getFullYear();

var day = d.getDay();
var dayarr =["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
day=dayarr[day];

var hour =d.getHours();
var min = d.getMinutes();
var sec = d.getSeconds();

document.getElementById("day").innerHTML=day;
document.getElementById("date").innerHTML= month + " " + date + ", " + year;
document.getElementById("time").innerHTML=hour+":"+min+":"+sec;

document.getElementById("header-date").innerHTML= month + " " + date + " | " + hour+":"+min+":"+sec;
}