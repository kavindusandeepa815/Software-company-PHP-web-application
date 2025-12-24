document.addEventListener('DOMContentLoaded', function () {
  const scrollContainer = document.querySelector('.logo-scroll');
  let isDown = false;
  let startX;
  let scrollLeft;

  scrollContainer.addEventListener('mousedown', function (e) {
    isDown = true;
    startX = e.pageX - scrollContainer.offsetLeft;
    scrollLeft = scrollContainer.scrollLeft;
  });

  scrollContainer.addEventListener('mouseleave', function () {
    isDown = false;
  });

  scrollContainer.addEventListener('mouseup', function () {
    isDown = false;
  });

  scrollContainer.addEventListener('mousemove', function (e) {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - scrollContainer.offsetLeft;
    const walk = (x - startX) * 3; // ස්ථාපනයේ වේගය සඳහා සක්‍රිය කරන්න
    scrollContainer.scrollLeft = scrollLeft - walk;
  });

  const scrollLeftButton = document.querySelector('#scroll-left-button');
  const scrollRightButton = document.querySelector('#scroll-right-button');

  var isMouseDownLeft = false;
  var isMouseDownRight = false;

  scrollLeftButton.addEventListener('mousedown', function () {
    isMouseDownLeft = true;
    scrollContainer.scrollLeft -= 200; // Scroll left by 200 pixels
  });

  scrollLeftButton.addEventListener('mouseup', function () {
    isMouseDownLeft = false;
  });

  scrollLeftButton.addEventListener('mouseleave', function () {
    isMouseDownLeft = false;
  });

  scrollRightButton.addEventListener('mousedown', function () {
    isMouseDownRight = true;
    scrollContainer.scrollLeft += 200; // Scroll right by 200 pixels
  });

  scrollRightButton.addEventListener('mouseup', function () {
    isMouseDownRight = false;
  });

  scrollRightButton.addEventListener('mouseleave', function () {
    isMouseDownRight = false;
  });

  setInterval(function () {
    if (isMouseDownLeft) {
      scrollContainer.scrollLeft -= 200; // Scroll left by 200 pixels
    }

    if (isMouseDownRight) {
      scrollContainer.scrollLeft += 200; // Scroll right by 200 pixels
    }
  }, 300);
});








// Function to check the user's scrolling position and show/hide the button
function checkScroll() {
  if (window.scrollY > 600) { // Change the value (300) to control when the button appears
    document.getElementById("scrollToTopBtn").style.display = "block";

    document.getElementById("balla").style.backgroundColor = "white";
    document.getElementById("balla").style.boxShadow = "7px 7px 7px 0px #d9deff";

    document.getElementById("ballaImg").src = "Img/MaestroCrew9.png";
    const element = document.querySelector(".nav-link.textGREDIENThover");
    if (element) {
      element.classList.remove("textGREDIENThover");
      element.classList.add("textGREDIENThoverA");
    }
    document.getElementById("ballaButton").className = "btn btn-outline-primary";


  } else {
    document.getElementById("scrollToTopBtn").style.display = "none";


    document.getElementById("balla").style.backgroundColor = "#071252";
    document.getElementById("balla").style.boxShadow = "none";

    document.getElementById("ballaImg").src = "Img/MaestroCrew12.png";
    const element = document.querySelector(".nav-link.textGREDIENThoverA");
    if (element) {
      element.classList.remove("textGREDIENThoverA");
      element.classList.add("textGREDIENThover");
    }
    document.getElementById("ballaButton").className = "btn btn-outline-info";


  }
}

// Function to scroll to the top of the page
function scrollToTop() {
  // For modern browsers
  if ('scrollBehavior' in document.documentElement.style) {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  } else {
    // For older browsers (Safari, IE, and some others)
    // For Safari
    document.body.scrollTop = 0;
    // For Chrome, Firefox, IE, and Opera
    document.documentElement.scrollTop = 0;
  }
}

// Call the function when needed, e.g., when clicking a button
// Example: document.getElementById('scrollToTopButton').addEventListener('click', scrollToTop);

// Listen for scroll events and update the button visibility accordingly
window.addEventListener('scroll', checkScroll);







function reveal() {
  var reveals = document.querySelectorAll(".reveal");
  var windowHeight = window.innerHeight;
  var elementVisible = 100;

  for (var i = 0; i < reveals.length; i++) {
    var elementTop = reveals[i].getBoundingClientRect().top;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);





window.onload = function () {

  // Main
  var elementToAnimate1 = document.querySelector('.mainPhoto');
  var elementToAnimate2 = document.querySelector('.mainDiv');
  var elementToAnimate3 = document.querySelector('.mainText');
  var elementToAnimate4 = document.querySelector('.mainText2');

  setTimeout(function () {
    elementToAnimate1.classList.add('mainPhotoA');
  }, 300);

  // setTimeout(function () {
  //   elementToAnimate2.classList.add('mainDivA');
  // }, 1500);

  setTimeout(function () {
    elementToAnimate3.classList.add('mainTextA');
  }, 1200);

  setTimeout(function () {
    elementToAnimate4.classList.add('mainText2A');
  }, 1800);

  // Sub
  var elementToAnimate5 = document.querySelector('.subImg');
  var elementToAnimate6 = document.querySelector('.subText');
  var elementToAnimate7 = document.querySelector('.subText2');

  setTimeout(function () {
    elementToAnimate5.classList.add('subImgA');
  }, 100);

  setTimeout(function () {
    elementToAnimate6.classList.add('subTextA');
  }, 1600);

  setTimeout(function () {
    elementToAnimate7.classList.add('subText2A');
  }, 2200);

};





document.addEventListener('DOMContentLoaded', function () {
  // When the page is fully loaded, hide the loader
  document.querySelector('.loader-overlay').style.display = 'none';
});

$(document).ready(function () {
  // Show loader before AJAX request starts
  $(document).ajaxStart(function () {
    $('.loader-overlay').show();
  });

  // Hide loader when AJAX request completes (whether successful or not)
  $(document).ajaxStop(function () {
    $('.loader-overlay').hide();
  });
});



$(document).ready(function () {
  $(".animated-element").animate(
    { opacity: 1, marginLeft: "50px" },
    2000
  );
});





function movePage(page) {
  window.location = page + ".php";
}



function showDetails(newsId) {
  window.location.href = 'news_brief.php?id=' + newsId;
}

function showBlog(blogId) {
  window.location.href = 'blog_brief.php?id=' + blogId;
}








function searchU(search) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById(search).value;


  var form = new FormData();
  form.append("search", searchText);
  form.append("searchWhat", search);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {


        if (search == "SuserEmail") {
          document.getElementById("SuserResult").innerHTML = response;
        }

        if (search == "SuserName") {
          document.getElementById("SuserResult").innerHTML = response;
        }

        if (search == "SuserAll") {
          document.getElementById("SuserResult").innerHTML = response;
        }

        if (search == "SuserAllNone") {
          document.getElementById("SuserResult").innerHTML = response;
        }

      }

    }
  }

  request.open("POST", "searchU.php", true);
  request.send(form);

}





function searchEmp(search) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById(search).value;

  var form = new FormData();
  form.append("search", searchText);
  form.append("searchWhat", search);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {

        if (search == "SemployeeEmail") {
          document.getElementById("SemployeeResult").innerHTML = response;
        }

        if (search == "SemployeeName") {
          document.getElementById("SemployeeResult").innerHTML = response;
        }

        if (search == "SemployeeType") {
          document.getElementById("SemployeeResult").innerHTML = response;
        }

        if (search == "SemployeeAll") {
          document.getElementById("SemployeeResult").innerHTML = response;
        }

      }

    }
  }

  request.open("POST", "searchEmp.php", true);
  request.send(form);

}


function searchEmpHP(search) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById(search).value;
  var searchTextB = document.getElementById("SemployeeHPstatus").value;


  var form = new FormData();
  form.append("search", searchText);
  form.append("searchWhat", search);
  form.append("searchTextB", searchTextB);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Select Status.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {

        if (search == "SemployeeHPemail") {
          document.getElementById("SemployeeHPResult").innerHTML = response;
        }

        if (search == "SemployeeHPname") {
          document.getElementById("SemployeeHPResult").innerHTML = response;
        }

        if (search == "SemployeeHPstatus") {
          document.getElementById("SemployeeHPResult").innerHTML = response;
        }

      }

    }
  }

  request.open("POST", "searchEmpHP.php", true);
  request.send(form);

}



function searchP(search) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById(search).value;
  var searchTextB = document.getElementById("SprdPrdstatus").value;


  var form = new FormData();
  form.append("search", searchText);
  form.append("searchWhat", search);
  form.append("searchTextB", searchTextB);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Select Status.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {

        if (search == "SprdPrdstatus") {
          document.getElementById("SprdResult").innerHTML = response;
        }

        if (search == "SprdUemail") {
          document.getElementById("SprdResult").innerHTML = response;
        }

        if (search == "SprdPrdid") {
          document.getElementById("SprdResult").innerHTML = response;
        }

      }

    }
  }

  request.open("POST", "searchPrd.php", true);
  request.send(form);

}




function searchPrdHE(search) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById(search).value;


  var form = new FormData();
  form.append("search", searchText);
  form.append("searchWhat", search);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {
        if (search == "searchPrdHE") {
          document.getElementById("SprdPrdPhE").innerHTML = response;
        }

      }

    }
  }

  request.open("POST", "searchPrdHE.php", true);
  request.send(form);

}



function startProjectAdmin() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var title = document.getElementById("StartPrjAdmTitle").value;
  var type = document.getElementById("StartPrjAdmType").value;
  var email = document.getElementById("StartPrjAdmEmail").value;
  var status = document.getElementById("StartPrjAdmStatus").value;
  var end = document.getElementById("StartPrjAdmEnd").value;
  var amount = document.getElementById("StartPrjAdmAmount").value;
  var affiliate = document.getElementById("StartPrjAdmAffiliate").value;
  var affiliateId = document.getElementById("StartPrjAdmAffiliateID").value;
  var advanced = document.getElementById("StartPrjAdmAdvanced").value;


  var form = new FormData();
  form.append("title", title);
  form.append("type", type);
  form.append("email", email);
  form.append("status", status);
  form.append("end", end);
  form.append("amount", amount);
  form.append("affiliate", affiliate);
  form.append("affiliateId", affiliateId);
  form.append("advanced", advanced);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add Title.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Select Project Type.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter User Email.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Email Address.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "5") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Select Project Status.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "6") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter End Date.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "7") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter End Date Correct Pattern.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "8") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Amount.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "9") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Amount.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "10") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Affiliate.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "11") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Affiliate.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "16") {
        response1Modal.show();
        alertMessage.innerHTML = "Incorrect Affiliate Id.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "12") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Advanced.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "13") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Advanced.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "14") {
        response1Modal.show();
        alertMessage.innerHTML = "Project Add Successfully.";
        myModelColor.className = "modal-header bg-info text-light fw-bold";
      } else if (response == "15") {
        response1Modal.show();
        alertMessage.innerHTML = "This User Is Not Registerd.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }
  }

  request.open("POST", "startProjectAdmin.php", true);
  request.send(form);

}



function assignProjects() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var pid = document.getElementById("assignProjectsPid").value;
  var eid = document.getElementById("assignProjectsEid").value;
  var role = document.getElementById("assignProjectsRole").value;
  var amount = document.getElementById("assignProjectsAmount").value;
  var end = document.getElementById("assignProjectsEnd").value;



  var form = new FormData();
  form.append("pid", pid);
  form.append("eid", eid);
  form.append("role", role);
  form.append("amount", amount);
  form.append("end", end);




  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Project Id.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Project Id.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Employee Id.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Employee Id.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "5") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Employee Role.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "6") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter End Date.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "7") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct End Date.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "8") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Amount.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "9") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Amount.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "10") {
        response1Modal.show();
        alertMessage.innerHTML = "Employee Asigned Successfully.";
        myModelColor.className = "modal-header bg-info text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";

      }

    }
  }

  request.open("POST", "assignProjects.php", true);
  request.send(form);

}





function SearchPaymentsAdm(search) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById(search).value;
  var searchTextB = document.getElementById("SearchPaymentsAdmPyStuUser").value;
  var searchTextC = document.getElementById("SearchPaymentsAdmPyStuEmployee").value;


  var form = new FormData();
  form.append("search", searchText);
  form.append("searchWhat", search);
  form.append("searchTextB", searchTextB);
  form.append("searchTextC", searchTextC);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Select Status.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {
        document.getElementById("SearchPaymentsAdmResult").innerHTML = response;
      }

    }
  }

  request.open("POST", "SearchPaymentsAdm.php", true);
  request.send(form);

}



function adduser() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var userName = document.getElementById("userName").value;
  var userEmail = document.getElementById("userEmail").value;
  var userCountry = document.getElementById("userCountry").value;


  var form = new FormData();
  form.append("userName", userName);
  form.append("userEmail", userEmail);
  form.append("userCountry", userCountry);



  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter User Name.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "User Name Invalid Charachers.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "User Name Must Be Less Than 100 Characters.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Email.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "5") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Email Address.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "6") {
        response1Modal.show();
        alertMessage.innerHTML = "Email Must Be Less Than 100 Characters.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "7") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Select Country.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "8") {
        response1Modal.show();
        alertMessage.innerHTML = "User Add Successfully.";
        myModelColor.className = "modal-header bg-primary text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something went wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }
  }

  request.open("POST", "adduser.php", true);
  request.send(form);

}




function updateUser(id) {

  var result = confirm("Are you sure to update?");

  if (result == true) {

    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    var name = document.getElementById("updateUserAdmName_" + id).value;
    var email = document.getElementById("updateUserAdmEmail_" + id).value;
    var country = document.getElementById("updateUserAdmCountry_" + id).value;
    var status = document.getElementById("updateUserAdmStatus_" + id).value;


    var form = new FormData();
    form.append("name", name);
    form.append("email", email);
    form.append("country", country);
    form.append("status", status);
    form.append("id", id);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;

        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Something went wrong User Id.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Name.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "3") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Email.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "4") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Select Country.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "5") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Select Status.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "6") {
          response1Modal.show();
          alertMessage.innerHTML = "User Update Successfully.";
          myModelColor.className = "modal-header bg-primary text-light fw-bold";
        } else {
          response1Modal.show();
          alertMessage.innerHTML = "Something went wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        }

      }
    }

    request.open("POST", "updateUser.php", true);
    request.send(form);

  }

}


function addEmployees() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var employeeName = document.getElementById("employeeName").value;
  var employeeEmail = document.getElementById("employeeEmail").value;
  var employeeContact = document.getElementById("employeeContact").value;
  var employeeBank = document.getElementById("employeeBank").value;
  var employeeProType = document.getElementById("employeeProType").value;


  var form = new FormData();
  form.append("employeeName", employeeName);
  form.append("employeeEmail", employeeEmail);
  form.append("employeeContact", employeeContact);
  form.append("employeeBank", employeeBank);
  form.append("employeeProType", employeeProType);



  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Employee Name.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Employee Name Invalid Charachers.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Employee Name Must Be Less Than 100 Characters.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Email.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "5") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Email Address.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "6") {
        response1Modal.show();
        alertMessage.innerHTML = "Email Must Be Less Than 100 Characters.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "7") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Employee Contact.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "8") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Contact Number.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "9") {
        response1Modal.show();
        alertMessage.innerHTML = "Contact Must Be Less Than 14 Characters..";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "10") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Bank Details(None).";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "11") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Employee Project Type.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "12") {
        response1Modal.show();
        alertMessage.innerHTML = "Employee Add Successfully.";
        myModelColor.className = "modal-header bg-primary text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something went wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }
  }

  request.open("POST", "addEmployees.php", true);
  request.send(form);

}



function updateEmployee(id) {

  var result = confirm("Are you sure to update?");

  if (result == true) {

    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    var updateEmpName = document.getElementById("updateEmpName_" + id).value;
    var updateEmpEmail = document.getElementById("updateEmpEmail_" + id).value;
    var updateEmpContact = document.getElementById("updateEmpContact_" + id).value;
    var updateEmpBank = document.getElementById("updateEmpBank_" + id).value;
    var updateEmpType = document.getElementById("updateEmpType_" + id).value;
    var updateEmpStatus = document.getElementById("updateEmpStatus_" + id).value;


    var form = new FormData();
    form.append("updateEmpName", updateEmpName);
    form.append("updateEmpEmail", updateEmpEmail);
    form.append("updateEmpContact", updateEmpContact);
    form.append("updateEmpBank", updateEmpBank);
    form.append("updateEmpType", updateEmpType);
    form.append("updateEmpStatus", updateEmpStatus);
    form.append("updateEmpId", id);



    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;

        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Employee Name.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "Employee Name Invalid Charachers.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "3") {
          response1Modal.show();
          alertMessage.innerHTML = "Employee Name Must Be Less Than 100 Characters.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "4") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Email.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "5") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Correct Email Address.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "6") {
          response1Modal.show();
          alertMessage.innerHTML = "Email Must Be Less Than 100 Characters.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "7") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Employee Contact.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "8") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Correct Contact Number.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "9") {
          response1Modal.show();
          alertMessage.innerHTML = "Contact Must Be Less Than 14 Characters.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "10") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Bank Details(None).";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "11") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Employee Project Type.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "12") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Employee Status.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "13") {
          response1Modal.show();
          alertMessage.innerHTML = "Somethig Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "14") {
          response1Modal.show();
          alertMessage.innerHTML = "Employee Add Successfully.";
          myModelColor.className = "modal-header bg-primary text-light fw-bold";
        } else {
          response1Modal.show();
          alertMessage.innerHTML = "Something went wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        }

      }
    }

    request.open("POST", "updateEmployee.php", true);
    request.send(form);

  }

}





function updateProject(pid, uid) {

  var result = confirm("Are you sure to update?");

  if (result == true) {


    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    var updateProjectTitle = document.getElementById("updateProjectTitle_" + pid + "_" + uid).value;
    var updateProjectStatus = document.getElementById("updateProjectStatus_" + pid + "_" + uid).value;
    var updateProjectEnd = document.getElementById("updateProjectEnd_" + pid + "_" + uid).value;
    var updateProjectAmount = document.getElementById("updateProjectAmount_" + pid + "_" + uid).value;
    var updateProjectAffiliate = document.getElementById("updateProjectAffiliate_" + pid + "_" + uid).value;
    var updateProjectAdvanced = document.getElementById("updateProjectAdvanced_" + pid + "_" + uid).value;


    var form = new FormData();
    form.append("updateProjectTitle", updateProjectTitle);
    form.append("updateProjectStatus", updateProjectStatus);
    form.append("updateProjectEnd", updateProjectEnd);
    form.append("updateProjectAmount", updateProjectAmount);
    form.append("updateProjectAffiliate", updateProjectAffiliate);
    form.append("updateProjectAdvanced", updateProjectAdvanced);
    form.append("pid", pid);
    form.append("uid", uid);


    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;

        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Add Title.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Select Project Status.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "3") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter End Date.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "4") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter End Date Correct Pattern.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "5") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Amount.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "6") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Correct Amount.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "7") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Affiliate.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "8") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Correct Affiliate.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "9") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Advanced.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "10") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Correct Advanced.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "11") {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "12") {
          response1Modal.show();
          alertMessage.innerHTML = "Successfully Updated.";
          myModelColor.className = "modal-header bg-success text-light fw-bold";
        } else {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        }

      }
    }

    request.open("POST", "updateProject.php", true);
    request.send(form);

  }

}






function updatePrdHE(pid, eid) {

  var result = confirm("Are you sure to update?");

  if (result == true) {


    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    var updatePrdHERole = document.getElementById("updatePrdHERole_" + pid + "_" + eid).value;
    var updatePrdHEAmount = document.getElementById("updatePrdHEAmount_" + pid + "_" + eid).value;
    var updatePrdHEEnd = document.getElementById("updatePrdHEEnd_" + pid + "_" + eid).value;
    var updatePrdHEPrdStatus = document.getElementById("updatePrdHEPrdStatus_" + pid + "_" + eid).value;
    var updatePrdHEPayStatus = document.getElementById("updatePrdHEPayStatus_" + pid + "_" + eid).value;


    var form = new FormData();
    form.append("updatePrdHERole", updatePrdHERole);
    form.append("updatePrdHEAmount", updatePrdHEAmount);
    form.append("updatePrdHEEnd", updatePrdHEEnd);
    form.append("updatePrdHEPrdStatus", updatePrdHEPrdStatus);
    form.append("updatePrdHEPayStatus", updatePrdHEPayStatus);
    form.append("pid", pid);
    form.append("eid", eid);


    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;

        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Role.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Amount.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "3") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Correct Amount.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "4") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter End Date.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "5") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Correct End Date.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "6") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Prject Status.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "7") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter PaymentStatus.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "8") {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "9") {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "10") {
          response1Modal.show();
          alertMessage.innerHTML = "Updated Successfully.";
          myModelColor.className = "modal-header bg-info text-light fw-bold";
        } else {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";

        }

      }
    }

    request.open("POST", "updatePrdHE.php", true);
    request.send(form);

  }

}





function removePrdHE(pid, eid) {


  var result = confirm("Are you sure to delete?");


  if (result == true) {

    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    var form = new FormData();
    form.append("pid", pid);
    form.append("eid", eid);


    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;


        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "3") {
          response1Modal.show();
          alertMessage.innerHTML = "Remove Successfully.";
          myModelColor.className = "modal-header bg-info text-light fw-bold";
        } else {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";

        }

      }
    }

    request.open("POST", "removePrdHE.php", true);
    request.send(form);

  }

}





function addpaymentAdm() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var addPaymentAdmAmount = document.getElementById("addPaymentAdmAmount").value;
  var addPaymentAdmType = document.getElementById("addPaymentAdmType").value;
  var addPaymentAdmPId = document.getElementById("addPaymentAdmPId").value;
  var addPaymentAdmUEId = document.getElementById("addPaymentAdmUEId").value;

  var form = new FormData();
  form.append("addPaymentAdmAmount", addPaymentAdmAmount);
  form.append("addPaymentAdmType", addPaymentAdmType);
  form.append("addPaymentAdmPId", addPaymentAdmPId);
  form.append("addPaymentAdmUEId", addPaymentAdmUEId);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Amount.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Amount.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Payment Type.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Project Id.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "5") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Project Id.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "6") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Employee Id.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "7") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Employee Id.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "8") {
        response1Modal.show();
        alertMessage.innerHTML = "You Can't Add It.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "9") {
        response1Modal.show();
        alertMessage.innerHTML = "Payment Add Successfully.";
        myModelColor.className = "modal-header bg-info text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }
  }

  request.open("POST", "addpaymentAdm.php", true);
  request.send(form);

}



function updatePaymentAdm(pid, uid, id) {

  var result = confirm("Are you sure to update?");

  if (result == true) {

    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    var updatePaymentAdmAmount = document.getElementById("updatePaymentAdmAmount_" + id).value;
    var updatePaymentAdmType = document.getElementById("updatePaymentAdmType_" + id).value;
    var updatePaymentAdmStatus = document.getElementById("updatePaymentAdmStatus_" + id).value;

    var form = new FormData();
    form.append("updatePaymentAdmAmount", updatePaymentAdmAmount);
    form.append("updatePaymentAdmType", updatePaymentAdmType);
    form.append("updatePaymentAdmStatus", updatePaymentAdmStatus);
    form.append("id", id);
    form.append("pid", pid);
    form.append("uid", uid);


    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;

        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Add Amount.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Add Correct Amount.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "3") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Add Payment Type.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "4") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Add Payment Status.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "5") {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "6") {
          response1Modal.show();
          alertMessage.innerHTML = "Updated Successfully.";
          myModelColor.className = "modal-header bg-info text-light fw-bold";
        } else {
          // alert(response);
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";

        }

      }
    }

    request.open("POST", "updatePaymentAdm.php", true);
    request.send(form);

  }

}





function removePaymentAdm(pid, uid, id) {

  var result = confirm("Are you sure to deleteee?");

  if (result == true) {

    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    var updatePaymentAdmType = document.getElementById("updatePaymentAdmType_" + pid + "_" + uid + "_" + id).value;
    var updatePaymentAdmStatus = document.getElementById("updatePaymentAdmStatus_" + pid + "_" + uid + "_" + id).value;

    var form = new FormData();
    form.append("updatePaymentAdmType", updatePaymentAdmType);
    form.append("updatePaymentAdmStatus", updatePaymentAdmStatus);
    form.append("id", id);
    form.append("pid", pid);
    form.append("uid", uid);


    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;

        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went WrongA.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "You canot delete this.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "6") {
          response1Modal.show();
          alertMessage.innerHTML = "Delete Successfully.";
          myModelColor.className = "modal-header bg-success text-light fw-bold";
        } else {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went WrongB.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";

        }

      }
    }

    request.open("POST", "removePaymentAdm.php", true);
    request.send(form);

  }

}





function userSignIn() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var email = document.getElementById("userSignInEmail").value;
  var password = document.getElementById("userSignInPassword").value;
  var remember = document.getElementById("userSignInRemember").checked;

  var form = new FormData();

  form.append("email", email);
  form.append("password", password);
  form.append("remember", remember);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        document.getElementById("userSignInEmail").className = "form-control is-invalid";
        document.getElementById("userSignInEmailMessage").className = "invalid-feedback d-block";
      } else if (response == "2") {
        document.getElementById("userSignInPassword").className = "form-control is-invalid";
        document.getElementById("userSignInPasswordMessage").className = "invalid-feedback d-block";
      } else if (response == "3") {
        window.location = "profile.php";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Wrong Email Or Password.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";

      }

    }
  }

  request.open("POST", "userSignIn.php", true);
  request.send(form);

}


function userSignOut() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {

    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        window.location = "index.php";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }

  };

  request.open("GET", "userSignOut.php", true);
  request.send();

}





function forgotPassword(id) {

  $('.loader-overlay').show();

  var email = document.getElementById("forgotPasswordEmail").value;

  var url = "resetPassword.php?email=" + encodeURIComponent(email) + "&id=" + encodeURIComponent(id);


  var form = new FormData();
  form.append("email", email);
  form.append("id", id);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      $('.loader-overlay').hide();

      if (response == "1") {
        document.getElementById("forgotPasswordEmail").className = "form-control is-invalid";
        document.getElementById("forgotPasswordEmailMessage").className = "invalid-feedback d-block";
      } else if (response == "5") {
        document.getElementById("forgotPasswordEmail").className = "form-control is-invalid";
        document.getElementById("forgotPasswordEmailMessageBB").className = "invalid-feedback d-block";
      } else if (response == "6") {
        document.getElementById("forgotPasswordEmail").className = "form-control is-invalid";
        document.getElementById("forgotPasswordEmailMessageCC").className = "invalid-feedback d-block";
      } else if (response == "2") {
        document.getElementById("forgotPasswordEmailAlert").className = "alert alert-danger d-block";
        document.getElementById("forgotPasswordEmailAlert").innerHTML = "Please Enter Correct Email Address.";
      } else if (response == "3") {
        document.getElementById("forgotPasswordEmailAlert").className = "alert alert-danger d-block";
        document.getElementById("forgotPasswordEmailAlert").innerHTML = "Verification code sending failed.";
      } else if (response == "4") {
        window.location.href = url;
      } else {
        document.getElementById("forgotPasswordEmailAlert").className = "alert alert-danger d-block";
        document.getElementById("forgotPasswordEmailAlert").innerHTML = "Something Went Wrong.";

      }

    }
  }

  request.open("POST", "forgotPasswordProcess.php", true);
  request.send(form);

}



function resetPassword(id) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var email = document.getElementById("resetPasswordEmail").value;
  var vcode = document.getElementById("resetPasswordVcode").value;
  var password = document.getElementById("resetPasswordNewPassword").value;
  var repassword = document.getElementById("resetPasswordRePassword").value;


  var form = new FormData();
  form.append("id", id);
  form.append("email", email);
  form.append("vcode", vcode);
  form.append("password", password);
  form.append("repassword", repassword);




  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "2") {
        document.getElementById("resetPasswordVcode").className = "form-control is-invalid";
        document.getElementById("resetPasswordVcodeMessage").className = "invalid-feedback d-block";
      } else if (response == "3") {
        document.getElementById("resetPasswordNewPassword").className = "form-control is-invalid";
        document.getElementById("resetPasswordNewPasswordMessage").className = "invalid-feedback d-block";
      } else if (response == "4") {
        document.getElementById("resetPasswordNewPassword").className = "form-control is-invalid";
        document.getElementById("resetPasswordNewPasswordMessageB").className = "invalid-feedback d-block";
      } else if (response == "5") {
        document.getElementById("resetPasswordRePassword").className = "form-control is-invalid";
        document.getElementById("resetPasswordRePasswordMessage").className = "invalid-feedback d-block";
      } else if (response == "6") {
        document.getElementById("resetPasswordRePassword").className = "form-control is-invalid";
        document.getElementById("resetPasswordRePasswordMessageB").className = "invalid-feedback d-block";
      } else if (response == "7") {
        response1Modal.show();
        alertMessage.innerHTML = "Invalid Verification Code(Verification Code sent your email).";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "8") {
        response1Modal.show();
        alertMessage.innerHTML = "Password Reset successfull. Go back to signIn.";
        myModelColor.className = "modal-header successAlert text-light fw-bold";
        if (id == "user") {
          window.location = "signIn.php";
        } else if (id == "affiliate") {
          window.location = "signIn_affiliate.php";
        } else {
          window.location = "index.php";
        }

      } else {
        // alert(response);
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";

      }

    }
  }

  request.open("POST", "resetPasswordProcess.php", true);
  request.send(form);

}





function userRegisterA(id) {

  $('.loader-overlay').show();

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var email = document.getElementById("userRegisterAEmail").value;

  var url = "registerB.php?email=" + encodeURIComponent(email) + "&id=" + encodeURIComponent(id);

  var form = new FormData();
  form.append("email", email);
  form.append("id", id);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      $('.loader-overlay').hide();

      if (response == "1") {
        document.getElementById("userRegisterAEmail").className = "form-control is-invalid";
        document.getElementById("userRegisterAEmailMessage").className = "invalid-feedback d-block";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Email Allready In Use.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "5") {
        document.getElementById("userRegisterAEmail").className = "form-control is-invalid";
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Email Address.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "6") {
        document.getElementById("userRegisterAEmail").className = "form-control is-invalid";
        response1Modal.show();
        alertMessage.innerHTML = "Email Should Be Less Than 100 Characters.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Email Sending Failed";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "4") {
        window.location.href = url;
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";

      }

    }
  }

  request.open("POST", "userRegisterA.php", true);
  request.send(form);

}




function userRegisterB(id) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var email = document.getElementById("userRegisterBEmail").value;
  var vcode = document.getElementById("userRegisterBvcode").value;

  var url = "registerC.php?email=" + encodeURIComponent(email) + "&id=" + encodeURIComponent(id);

  var form = new FormData();
  form.append("email", email);
  form.append("vcode", vcode);
  form.append("id", id);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "2") {
        document.getElementById("userRegisterBvcode").className = "form-control is-invalid";
        document.getElementById("userRegisterBvcodeMessage").className = "invalid-feedback d-block";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Email Verifivation Successfull.";
        myModelColor.className = "modal-header successAlert text-light fw-bold";
        window.location.href = url;
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Email Or Verification Code Invalid.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";

      }

    }
  }

  request.open("POST", "userRegisterB.php", true);
  request.send(form);

}




function userRegisterC(id) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var email = document.getElementById("userRegisterCEmail").value;
  var name = document.getElementById("userRegisterCName").value;
  var country = document.getElementById("userRegisterCCountry").value;
  var password = document.getElementById("userRegisterCPassword").value;
  var repassword = document.getElementById("userRegisterCRePassword").value;


  var form = new FormData();
  form.append("id", id);
  form.append("email", email);
  form.append("name", name);
  form.append("country", country);
  form.append("password", password);
  form.append("repassword", repassword);



  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "4") {
        document.getElementById("userRegisterCName").className = "form-control is-invalid";
        document.getElementById("userRegisterCNameMessage").className = "invalid-feedback d-block";
      } else if (response == "5") {
        document.getElementById("userRegisterCName").className = "form-control is-invalid";
        response1Modal.show();
        alertMessage.innerHTML = "Please Enter Correct Name.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "6") {
        document.getElementById("userRegisterCName").className = "form-control is-invalid";
        response1Modal.show();
        alertMessage.innerHTML = "Name Should be Less Than 100 Characters.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "7") {
        document.getElementById("userRegisterCCountry").className = "form-control is-invalid";
        document.getElementById("userRegisterCCountryMessage").className = "invalid-feedback d-block";
      } else if (response == "8") {
        document.getElementById("userRegisterCPassword").className = "form-control is-invalid";
        document.getElementById("userRegisterCPasswordMessage").className = "invalid-feedback d-block";
      } else if (response == "9") {
        document.getElementById("userRegisterCPassword").className = "form-control is-invalid";
        response1Modal.show();
        alertMessage.innerHTML = "Password should be at least 5 characters in length and should include at least one upper case letter, one number, and one special character.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "10") {
        document.getElementById("userRegisterCRePassword").className = "form-control is-invalid";
        document.getElementById("userRegisterCRePasswordMessage").className = "invalid-feedback d-block";
      } else if (response == "11") {
        document.getElementById("userRegisterCRePassword").className = "form-control is-invalid";
        response1Modal.show();
        alertMessage.innerHTML = "Password Did Not Match.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "12") {
        response1Modal.show();
        alertMessage.innerHTML = "Invalid Email.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "13") {
        response1Modal.show();
        alertMessage.innerHTML = "Registration SuccessFull Go Back to Sign In.";
        myModelColor.className = "modal-header successAlert text-light fw-bold";
        if (id == "user") {
          window.location = "signIn.php";
        } else if (id == "affiliate") {
          window.location = "signIn_affiliate.php";
        } else {
          window.location = "index.php";
        }
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";

      }

    }
  }

  request.open("POST", "userRegisterC.php", true);
  request.send(form);

}


function changePasswordType() {
  var input = document.getElementById("userUpdateUserPassword");;

  if (input.type == "password") {
    input.type = "text";
  } else {
    input.type = "password";
  }
}



function gotItContact(id) {

  var result = confirm("Are you sure to send Email?");

  if (result == true) {

    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    $('.loader-overlay').show();

    var email = document.getElementById("gotItContactEmail").value;

    var form = new FormData();
    form.append("email", email);
    form.append("id", id);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;

        $('.loader-overlay').hide();

        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "Email Did Not Sent.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "3") {
          response1Modal.show();
          alertMessage.innerHTML = "Email Sent Successfull.";
          myModelColor.className = "modal-header bg-success text-light fw-bold";
          window.location.reload();
        } else {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        }

      }

    };

    request.open("POST", "gotItContact.php", true);
    request.send(form);

  }
}


function dismissContact(id) {

  var result = confirm("Are you sure to dismiss?");

  if (result == true) {

    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {

      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;

        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "Update Successfull.";
          myModelColor.className = "modal-header bg-success text-light fw-bold";
          window.location.reload();
        } else {
          response1Modal.show();
          alertMessage.innerHTML = "Something Went Wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        }

      }

    };

    request.open("GET", "dismissContact.php?id=" + id, true);
    request.send();

  }

}



function searchDescription() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));
  var id = document.getElementById("searchDescriptionId").value;

  var form = new FormData();
  form.append("id", id);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "No Data Available.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {
        document.getElementById("searchdescriptionResult").innerHTML = response;
      }

    }
  }

  request.open("POST", "searchDescription.php", true);
  request.send(form);

}




function updateDescription(id) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));
  var text = document.getElementById("updateDescriptionText").value;

  var form = new FormData();
  form.append("id", id);
  form.append("text", text);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "No Data Available.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "update Successfull.";
        myModelColor.className = "modal-header bg-success text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }
  }

  request.open("POST", "updateDescription.php", true);
  request.send(form);

}




function addDescription() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));
  var id = document.getElementById("addDescriptionId").value;
  var text = document.getElementById("addDescriptionText").value;

  var form = new FormData();
  form.append("id", id);
  form.append("text", text);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "update Successfull.";
        myModelColor.className = "modal-header bg-success text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }
  }

  request.open("POST", "addDescription.php", true);
  request.send(form);

}




function adminSignIn() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));
  var email = document.getElementById("adminSignInEmail").value;
  var password = document.getElementById("adminSignInPassword").value;

  var form = new FormData();
  form.append("email", email);
  form.append("password", password);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        document.getElementById("adminSignInEmail").className = "form-control is-invalid";
        document.getElementById("adminSignInEmailMessage").className = "invalid-feedback d-block";
      } else if (response == "2") {
        document.getElementById("adminSignInPassword").className = "form-control is-invalid";
        document.getElementById("adminSignInPasswordMessage").className = "invalid-feedback d-block";
      } else if (response == "3") {
        window.location = "admin.php";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Wrong Email Or Password.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "5") {
        response1Modal.show();
        alertMessage.innerHTML = "Admin Not Found.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";

      }

    }
  }

  request.open("POST", "adminSignInProcess.php", true);
  request.send(form);

}


function adminSignOut() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {

    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        window.location = "index.php";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }

  };

  request.open("GET", "adminSignOut.php", true);
  request.send();

}





function submitContact() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  $('.loader-overlay').show();

  var name = document.getElementById("contactFormName").value;
  var email = document.getElementById("contactFormEmail").value;
  var country = document.getElementById("contactFormCountry").value;
  var message = document.getElementById("contactFormMessage").value;


  var form = new FormData();
  form.append("name", name);
  form.append("email", email);
  form.append("country", country);
  form.append("message", message);


  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      $('.loader-overlay').hide();

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please enter email.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Please enter correct email address.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Email must be less than 100 characters.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Please enter name.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "5") {
        response1Modal.show();
        alertMessage.innerHTML = "Please enter correct name.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "6") {
        response1Modal.show();
        alertMessage.innerHTML = "Name must be less than 100 characters.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "7") {
        response1Modal.show();
        alertMessage.innerHTML = "Please select country.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "8") {
        response1Modal.show();
        alertMessage.innerHTML = "Please enter message.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "9") {
        response1Modal.show();
        alertMessage.innerHTML = "Successfully submited.";
        myModelColor.className = "modal-header successAlert text-light fw-bold";
      } else if (response == "10") {
        response1Modal.show();
        alertMessage.innerHTML = "Something went wrong. Please try again later.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else {
        alert(response);
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";

      }

    }
  }

  request.open("POST", "submitContact.php", true);
  request.send(form);

}




function payment(id, amount) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));


  var form = new FormData();
  form.append("id", id);
  form.append("amount", amount);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "payment Successfull.";
        myModelColor.className = "modal-header successAlert  text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";

      }

      // alert(response);

    }
  }

  request.open("POST", "payment.php", true);
  request.send(form);

}


function printInvoice() {
  var restorepage = document.body.innerHTML;
  var page = document.getElementById("printContent").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = restorepage;
}






// affiliate

function affiliateSignIn() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var email = document.getElementById("affiliateSignInEmail").value;
  var password = document.getElementById("affiliateSignInPassword").value;
  var remember = document.getElementById("affiliateSignInRemember").checked;

  var form = new FormData();

  form.append("email", email);
  form.append("password", password);
  form.append("remember", remember);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        document.getElementById("affiliateSignInEmail").className = "form-control is-invalid";
        document.getElementById("affiliateSignInEmailMessage").className = "invalid-feedback d-block";
      } else if (response == "2") {
        document.getElementById("affiliateSignInPassword").className = "form-control is-invalid";
        document.getElementById("affiliateSignInPasswordMessage").className = "invalid-feedback d-block";
      } else if (response == "3") {
        window.location = "affiliate.php";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Wrong Email Or Password.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";

      }

    }
  }

  request.open("POST", "affiliateSignIn.php", true);
  request.send(form);

}


function affiliateSignOut() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {

    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        window.location = "index.php";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something Went Wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }

  };

  request.open("GET", "affiliateSignOut.php", true);
  request.send();

}


function search_affiliate(search) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById(search).value;


  var form = new FormData();
  form.append("search", searchText);
  form.append("searchWhat", search);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {

        document.getElementById("SaffiliateResult").innerHTML = response;

      }

    }
  }

  request.open("POST", "search_affiliate.php", true);
  request.send(form);

}



function updateAffiliate(id) {

  var result = confirm("Are you sure to update?");

  if (result == true) {

    var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

    var name = document.getElementById("updateAffiliateAdmName_" + id).value;
    var email = document.getElementById("updateAffiliateAdmEmail_" + id).value;
    var country = document.getElementById("updateAffiliateAdmCountry_" + id).value;
    var status = document.getElementById("updateAffiliateAdmStatus_" + id).value;


    var form = new FormData();
    form.append("name", name);
    form.append("email", email);
    form.append("country", country);
    form.append("status", status);
    form.append("id", id);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {

        var response = request.responseText;

        if (response == "1") {
          response1Modal.show();
          alertMessage.innerHTML = "Something went wrong User Id.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "2") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Name.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "3") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Enter Email.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "4") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Select Country.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "5") {
          response1Modal.show();
          alertMessage.innerHTML = "Please Select Status.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        } else if (response == "6") {
          response1Modal.show();
          alertMessage.innerHTML = "User Update Successfully.";
          myModelColor.className = "modal-header bg-primary text-light fw-bold";
        } else {
          response1Modal.show();
          alertMessage.innerHTML = "Something went wrong.";
          myModelColor.className = "modal-header bg-danger text-light fw-bold";
        }

      }
    }

    request.open("POST", "updateAffiliate.php", true);
    request.send(form);

  }

}


function searchAffiliateHPrd() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById("searchAffiliateHPrd").value;


  var form = new FormData();
  form.append("search", searchText);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {

        document.getElementById("SaffiliateHPrdResult").innerHTML = response;

      }

    }
  }

  request.open("POST", "searchAffiliateHPrd.php", true);
  request.send(form);

}




function searchAffiliateOther() {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById("searchAffiliateOther").value;


  var form = new FormData();
  form.append("search", searchText);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {

        document.getElementById("ResultAffiliateOther").innerHTML = response;

      }

    }
  }

  request.open("POST", "searchAffiliateOther.php", true);
  request.send(form);

}


function updateAffiliateProfile(id) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var name = document.getElementById("updateAffiliateProfileName_" + id).value;
  var url = document.getElementById("updateAffiliateProfileUrl_" + id).value;
  var description = document.getElementById("updateAffiliateProfileDes_" + id).value;


  var form = new FormData();
  form.append("name", name);
  form.append("url", url);
  form.append("description", description);
  form.append("id", id);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Something went wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Please enter company name.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Please enter company url.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "4") {
        response1Modal.show();
        alertMessage.innerHTML = "Please enter description(None).";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      } else if (response == "5") {
        response1Modal.show();
        alertMessage.innerHTML = "Profile update successfull.";
        myModelColor.className = "modal-header successAlert text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something went wrong.";
        myModelColor.className = "modal-header warningAlert text-light fw-bold";
      }

    }
  }

  request.open("POST", "updateAffiliateProfile.php", true);
  request.send(form);

}

function moveSocial(id) {
  if (id == "facebook") {
    window.location.href = "https://www.facebook.com/maestrocrewcom";
  } else if (id == "instagram") {
    window.location.href = "https://www.instagram.com/MaestroCrew";
  } else if (id == "twitter") {
    window.location.href = "https://twitter.com/MaestroCrewcom";
  } else if (id == "linkedin") {
    window.location.href = "https://www.linkedin.com/company/maestrocrew";
  }
}




function search_affiliate_payment(search) {

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var searchText = document.getElementById(search).value;


  var form = new FormData();
  form.append("search", searchText);
  form.append("searchWhat", search);


  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Please Add text.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Not Result.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else {

        document.getElementById("SaffiliatePAYResult").innerHTML = response;

      }

    }
  }

  request.open("POST", "search_affiliate_payment.php", true);
  request.send(form);

}


function updateAffiliatepayment(id) {

  var status = document.getElementById("updateAffiliatepayment_" + id).value;

  var response1Modal = new bootstrap.Modal(document.getElementById('myModel'));

  var form = new FormData();
  form.append("id", id);
  form.append("status", status);



  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;

      if (response == "1") {
        response1Modal.show();
        alertMessage.innerHTML = "Something went wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "2") {
        response1Modal.show();
        alertMessage.innerHTML = "Please select status.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      } else if (response == "3") {
        response1Modal.show();
        alertMessage.innerHTML = "Update successfull.";
        myModelColor.className = "modal-header bg-success text-light fw-bold";
      } else {
        response1Modal.show();
        alertMessage.innerHTML = "Something went wrong.";
        myModelColor.className = "modal-header bg-danger text-light fw-bold";
      }

    }
  }

  request.open("POST", "update_affiliate_payment.php", true);
  request.send(form);

}





function payNow(upid) {

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {

      var response = request.responseText;
      var object = JSON.parse(response);

      // Payment completed. It can be a successful failure.
      payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        window.location = "success.php?id="+upid;
        // Note: validate the payment and show success or failure page to the customer
      };

      // Payment window closed
      payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
        window.location = "profile.php";
      };

      // Error occurred
      payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
        window.location = "profile.php";
      };

      // Put the payment variables here
      var payment = {
        "sandbox": true,
        "merchant_id": "1221608",    // Replace your Merchant ID
        "return_url": "http://localhost/soco/success.php?id="+upid,     // Important
        "cancel_url": "http://localhost/soco/profile.php",     // Important
        "notify_url": "http://localhost/soco/news.php",
        "order_id": object["id"],
        "items": object["item"],
        "amount": object["amount"],
        "currency": "USD",
        "hash": object["hash"],
        "first_name": object["fname"],
        "last_name": "None",
        "email": object["email"],
        "phone": "None",
        "address": "None",
        "city": "None",
        "country": object["country"],
      };

      payhere.startPayment(payment);

    }
  }

  request.open("GET", "payment.php?id=" + upid, true);
  request.send();

}












