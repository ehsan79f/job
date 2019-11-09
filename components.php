<?php
/**
 * Created by PhpStorm.
 * User: Ehsan
 * Date: 11/6/2019
 * Time: 11:37 AM
 */
include "db.php";

function nav()
{
    return " <nav class='navbar navbar-expand-lg navbar-dark bg-dark fixed-top'>
    <div class='container'>
      <a class='navbar-brand brand' id='brand' href=''#'>جشنواره فیلم مدرسه</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarResponsive'>
        <ul class='navbar-nav ml-auto'>
          <li class='nav-item active '>
            <a class='nav-link' id='nav-link' href=''#'>خانه
             
            </a>
          </li>
          <li class='nav-item active'>
            <a class='nav-link' id='nav-link' href=''#'>درباره باشگاه</a>
          </li>
         
          <li class='nav-item active'>
            <a class='nav-link' id='nav-link' href=''#'>تماس با ما</a>
          </li>
            <li class='nav-item active'>
            <a class='nav-link' id='nav-link' data-toggle=\"modal\" data-target=\"#myModal\" href='#'>ورود</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>";
}

function cssInclude()
{
    return "
     <!-- Bootstrap core CSS -->
     <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>
     <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css\" >
    <link href='vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    ";

}

function jsInclude()
{
    return "
<script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"></script>
";
}

function projectList($conn){
    $query = "SELECT * FROM projects"; //You don't need a ; like you do in SQL
    $result = $conn->query($query);

    $output=" <div class='row'>";


    while($row = $result->fetch_assoc()){   //Creates a loop to loop through results
        $text=fa_number($row["title"]);


        $output.= "<div class='col-md-12 col-lg-6'>
                    <div id='card' class='card mb-4 box-shadow' onclick=\"location.href='project?id=".$row['_id']."';\">
                        <img class='card-img-top' src='images/profiles/".$row["picture"]."' alt='Card image cap'>
                       
                        <div class='card-body'>
                            <p class='card-title'>".$text."</p>
                        </div>
                    </div>
                </div>";  //$row['index'] the index here is a field name
    }
    $output.="</div>";

    return $output;
//    return "
//     <div class='row'>
//                <div class='col-md-12 col-lg-6'>
//                    <div class='card mb-4 box-shadow'>
//                        <img class='card-img-top' src='images/profiles/1573059219-download.png' alt='Card image cap'>
//                        <div class='card-body'>
//                            <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
//                            <div class='d-flex justify-content-between align-items-center'>
//                                <div class='btn-group'>
//                                    <button type='button' class='btn btn-sm btn-outline-secondary'>View</button>
//                                    <button type='button' class='btn btn-sm btn-outline-secondary'>Edit</button>
//                                </div>
//                                <small class='text-muted'>9 mins</small>
//                            </div>
//                        </div>
//                    </div>
//                </div>
//                <div class='col-md-12 col-lg-6'>
//                    <div class='card mb-4 box-shadow'>
//                        <img class='card-img-top' src='images/profiles/1573059219-download.png' alt='Card image cap'>
//                        <div class='card-body'>
//                            <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
//                            <div class='d-flex justify-content-between align-items-center'>
//                                <div class='btn-group'>
//                                    <button type='button' class='btn btn-sm btn-outline-secondary'>View</button>
//                                    <button type='button' class='btn btn-sm btn-outline-secondary'>Edit</button>
//                                </div>
//                                <small class='text-muted'>9 mins</small>
//                            </div>
//                        </div>
//                    </div>
//                </div>
//                <div class='col-md-12 col-lg-6'>
//                    <div class='card mb-4 box-shadow'>
//                        <img class='card-img-top' src='images/profiles/1573059219-download.png' alt='Card image cap'>
//                        <div class='card-body'>
//                            <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
//                            <div class='d-flex justify-content-between align-items-center'>
//                                <div class='btn-group'>
//                                    <button type='button' class='btn btn-sm btn-outline-secondary'>View</button>
//                                    <button type='button' class='btn btn-sm btn-outline-secondary'>Edit</button>
//                                </div>
//                                <small class='text-muted'>9 mins</small>
//                            </div>
//                        </div>
//                    </div>
//                </div>
//                <div class='col-md-12 col-lg-6'>
//                    <div class='card mb-4 box-shadow'>
//                        <img class='card-img-top' src='images/profiles/1573059219-download.png' alt='Card image cap'>
//                        <div class='card-body'>
//                            <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
//                            <div class='d-flex justify-content-between align-items-center'>
//                                <div class='btn-group'>
//                                    <button type='button' class='btn btn-sm btn-outline-secondary'>View</button>
//                                    <button type='button' class='btn btn-sm btn-outline-secondary'>Edit</button>
//                                </div>
//                                <small class='text-muted'>9 mins</small>
//                            </div>
//                        </div>
//                    </div>
//                </div>
//
//            </div>
//            ";
}

function fa_number($number)
{

    $en = array("0","1","2","3","4","5","6","7","8","9");
    $fa = array("۰","۱","۲","۳","۴","۵","۶","۷","۸","۹");
    return str_replace($en, $fa, $number);}
function modals(){
    return" <!-- Modal -->
  <div class=\"modal fade\" id=\"myModal\" role=\"dialog\">
    <div class=\"modal-dialog modal-lg\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
          <h4 class=\"modal-title\">Modal Header</h4>
        </div>
        <div class=\"modal-body\">
          <p>This is a large modal.</p>
        </div>
        <div class=\"modal-footer\">
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        </div>
      </div>
    </div>
  </div>";
}