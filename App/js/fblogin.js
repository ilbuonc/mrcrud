/* ********************************************************************** 
MRCRUD - My Rude Create Read Update Delete
Copyright (C) 2017  Giuseppe Dario Camiolo

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
********************************************************************** */

// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
  console.log('statusChangeCallback');
  console.log(response);
  // The response object is returned with a status field that lets the
  // app know the current login status of the person.
  // Full docs on the response object can be found in the documentation
  // for FB.getLoginStatus().
  if (response.status === 'connected') {
    // Logged into your app and Facebook.
    myfblogin();
  } else {
    // The person is not logged into your app or we are unable to tell.
    /*document.getElementById('status').innerHTML = 'Please log ' +
      'into this app.';*/
  }
}
// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function myfblogin() {
  console.log('Welcome!  Fetching your information.... ');
  FB.api('/me', function(response) {
    console.log(response);//check data debug TODO disable
    createMyFBAccount(response.name,response.id);
  });
}
/*Create AccountFB functions */
function createMyFBAccount(myfname,myfid){

var mydata = '&fname='+ myfname +'&fid='+myfid;
$.ajax({
type: 'POST',
/*dataType: 'json',*/
url: 'action/createAccountFB.php', 
data: mydata,
success: function(json)
{
 var data=json.result;
 document.getElementById('status').innerHTML = data;
 //dofblogin
 document.location.reload(true);
}, 
error: function(request, state, error)
{
 alert(request+' '+state+' '+error);
}

});

}
