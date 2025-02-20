<?php
//include "components/connection.php";
include "components/header.php";
// $stmt = $conn->prepare("SELECT * from furniture");
// $stmt->execute();
// $result = $stmt->get_result(); 
?>

<style>
    .btm-border {
    font-size: 14px;
    color: rgb(102, 102, 102);
    line-height: 24px;
    padding: 11px 0px 14px;
    margin: 0px;
    border-bottom: 1px solid rgb(247, 247, 247);
}
.user-details .sec-1 {
    font-size: 15px;
    padding: 0px 10px 0px 0px;
    margin: 0px;
}
.user-details .sec-2 {
    color: rgb(51, 51, 51);
    font-family: opensans-bold, Arial;
    font-weight: 700;
    font-size: 15px;
    padding: 0px;
    margin: 0px;
}
.sec-heading {
    font-weight: 600;
    font-size: 20px;
    color: rgb(51, 51, 51);
    margin: 0px;
    padding-top: 12px;
    padding-bottom: 12px;

    position: relative;
    border-bottom: 1px solid #ccc;
    padding-bottom: 12px;
    margin-bottom: 12px;
}

.sec-heading:before {
    content: "";
    position: absolute;
    width: 120px;
    height: 3px;
    z-index: 2;
    bottom: -1px;
    background-color: #0d6efd;
}
.details-header{
    padding: 10px 15px;
    border-radius: 5px;
    margin-top: 22px;
    margin-bottom: 20px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}
.order-id-heading {
    font-size: 18px;
    font-weight: 600;
}
.order-id {
    padding-left: 10px;
    font-size: 16px;
}
.btn-desgin {
    padding: 5px 15px;
    border-radius: 5px;
    font-weight: 600;
}
.approve-btn:hover {
    background-color: rgb(69, 214, 91);
    color: #fff;
    border-color: rgb(69, 214, 91);
}

.approve-btn {
    background-color: rgba(69, 214, 91, .1);
    color: rgb(69, 214, 91);
}

.decline-btn {
    background-color: rgba(243, 156, 18, .1);
    color: rgb(243, 156, 18);
}

.decline-btn:hover {
    background-color: rgb(243, 156, 18);
    color: #fff;
    border-color: rgb(243, 156, 18);
}

.delete-btn {
    background-color: rgba(231, 76, 60, .1);
    color: rgb(231, 76, 60);
}

.delete-btn:hover {
    background-color: rgb(231, 76, 60);
    color: #fff;
    border-color: rgb(231, 76, 60);
}

.btn-left-padding {
    margin-left: 10px;
}

</style>



              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Vertically Centered</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

<main id="main" class="main">
    
<div class="pagetitle">
  <h1>Data Tables</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
 
  <div class="card">
  <div class="card-body">
  <!-- <div class="row">
  <div class="col-lg-4">
    <div>order Id</div>
    <div>ORDER-10198</div>
  </div>
  <div class="col-lg-4">
  <div>order Date</div>
  <div>20 feb 2024</div>
  </div> -->

  <div class="d-flex details-header justify-content-between">
   <div class="d-flex align-items-center text-center">
   <div class="order-id-heading">Order Id </div>
   <div class="order-id">ORD-2903-45</div>
   </div>

   <div class="d-flex">
   <div class="approve-btn btn-desgin" data-bs-toggle="modal" data-bs-target="#verticalycentered">Approve</div>
   <div class="order-id btn-left-padding decline-btn btn-desgin">Decline</div>
   <div class="order-id btn-left-padding delete-btn btn-desgin">Delete</div>
   </div>

    
</div>

  <div>
<div class="sec-heading">
    Personal Details
</div>
  <div class="btm-border d-flex user-details">
    <div class="w-25 sec-1">Name</div>
    <div class="w-75 sec-2">Harsh Gupta</div>
</div>

<div class="btm-border d-flex user-details">
    <div class="w-25 sec-1">Father's Name</div>
    <div class="w-75 sec-2">Test</div>
</div>
</div>

<div>
<div class="sec-heading">
    Personal Details
</div>
  <div class="btm-border d-flex user-details">
    <div class="w-25 sec-1">Name</div>
    <div class="w-75 sec-2">Harsh Gupta</div>
</div>

<div class="btm-border d-flex user-details">
    <div class="w-25 sec-1">Father's Name</div>
    <div class="w-75 sec-2">Test</div>
</div>
</div>



  </div>
  </div>

  </div>
  </section>
</main>

<?php include "components/footer.php"?>