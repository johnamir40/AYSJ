 <html>
 <style>
 input {
 width: 799px;
height: 50px;
background: transparent;
border: 1px solid #fe0303;
/* Note: currently only Safari supports backdrop-filter */
backdrop-filter: blur(50px);
--webkit-backdrop-filter: blur(50px);
background-color: rgba(255, 255, 255, 0.5);
font-family: Arial;
font-weight: normal;
font-size: 14px;
text-align: left;
color: #fe0303;

 }
  button{
 width: 280px;
height: 81px;
border-radius: 6px;
background: #fff;
font-family: Helvetica;
font-weight: bold;
font-size: 16px;
line-height: 20px;
text-align: center;
color: #100e0e;
}
label{
padding: 20px;
width: 100px;
height: 50px;
background: #a31919;
font-family: Arial;
font-weight: bold;
font-size: 10px;
text-align: left;
color: #fff;
width: 100px;
height: 50px;
background: #a31919;
}
.myheader{
font-family: "Source Sans Pro";
font-weight: normal;
font-size: 28px;
line-height: 40px;
text-align: left;
color: #fff;
}
form > div{
padding-bottom: 10px;} 
.upload{
width: 100px;
height: 50px;
background: #a31919;
    position: relative;
    bottom: 45px;
    border-color: #a31919;

} 
.overtime{
width: 152px;
height: 40px;
border-radius: 20px;
background: #fff;
border: 2px solid #fff;
font-family: Helvetica;
font-weight: bold;
font-size: 18px;
line-height: 20px;
text-align: center;
color: #a31919;position: relative;
  top: 77px;
    left: 119px;}
 </style>
 <head>
 <script>

function myFunction() {

  var s = document.getElementById("overtime");
  if (s.style.display === "none") {
    s.style.display = "block";
  } 
}
function myFunction2() {
  var h = document.getElementById("overtime");
  if (h.style.display === "block") {
    h.style.display = "none";
       
  } 
}

</script>
 </head>
 <body  background="background.png">
 
 <h3 class='myheader'>View Employee:</h3>
 
 <div>
 <button onclick='myFunction()'class='overtime'>overtime</button></div>
 <form name="editemployee" method = "POST" action ="" >
  <div>
	 <img src=''style='width: 104px;height: 104px;border-radius: 52px;background: #fff;border: 1px solid #707070;'></img>
	 
     <div>
	 <label>Fullname Name:</label>
          <input type="text" placeholder="Fullname" name="FName" required="required">
</div>
<div>        
		<label>Address:</label>
            <input type="text" placeholder="Address" name="address" required="required">
</div>	
<div>
	<label>Phone Number:</label>
          <input type="number" placeholder="Phone Number" name ="Phone" required="required">
		  </div>
		  <div>
		 <label>Telephone:</label>
          <input type="number" placeholder="Telephone" name ="tele" required="required">
		  </div>
		  <div>
         <label> Email:</label>
          <input type="email" placeholder="Email" name ="Email" required="required">
		  </div>
		  <div>
		<label>Department:</label>
          <input type="text" placeholder="Department" name ="department" required="required">
          </div>
		  <div>
		  <label>Position:</label>
          <input type="text" placeholder="Position" name ="position" required="required">
         </div>
		  <div><label>Salary:</label>
          <input type="number" placeholder="Salary" name ="Username" required="required"></div>
		  <div>
          <label>Username:</label>
          <input type="text" placeholder="Username" name ="Username" required="required">
		  </div>
		  <div>
          <label>Password:</label>
          <input type="password" placeholder="Password" name="Password" required="required">
		   </div>
		   <div>
 <button name = "back">
Back
</button>

        
        <br>  <br>
        </form>
		</div>
		</div>
	<div id='overtime' style='display:none; width: 1133px;
height: 402px;
background: transparent;
border: 1px solid #fe0303;
box-shadow: -9px 3px 6px #100e0e;
/* Note: currently only Safari supports backdrop-filter */
backdrop-filter: blur(30px);
--webkit-backdrop-filter: blur(30px);
background-color: rgba(255, 255, 255, 0.15);
display:none;
position: relative;
    left: 249px;
    bottom: 700px;'>
	
<div style='position: relative;
    left: 47px;
    top: 110px;
}'>
<label style='width: 100px;
height: 50px;
background: #a31919;
font-family: "Source Sans Pro";
font-weight: normal;
font-size: 22px;
line-height: 40px;
text-align: left;
color: #fff;padding:9px;
'>weekday</label>
	<input style='width: 104px;
height: 50px;
background: transparent;
border: 1px solid #fe0303;
/* Note: currently only Safari supports backdrop-filter */
backdrop-filter: blur(50px);
--webkit-backdrop-filter: blur(50px);
background-color: rgba(255, 255, 255, 0.5);
' type='text' ></div>
	<div style='position: relative;
    left: 47px;
    top: 139px;'>
<label style='width: 100px;
height: 50px;
background: #a31919;
font-family: "Source Sans Pro";
font-weight: normal;
font-size: 22px;
line-height: 40px;
text-align: left;
color: #fff; padding:9px;
'>Night Shift</label>
	<input style='width: 104px;
height: 50px;
background: transparent;
border: 1px solid #fe0303;
/* Note: currently only Safari supports backdrop-filter */
backdrop-filter: blur(50px);
--webkit-backdrop-filter: blur(50px);
background-color: rgba(255, 255, 255, 0.5);
' type='text' >
<button onclick='myFunction2()'style='    width: 100;
    height: 61;
    position: relative;
    top: 123px;'type='button'>Back</button></div>
	
	</div>
</body>
</html>	