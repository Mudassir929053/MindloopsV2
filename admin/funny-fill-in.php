<?php include_once 'includes/head.php'; ?>
<div>
  <?php
  include_once 'includes/sidebar.php';
  ?>
  <!-- #Main ============================ -->
  <div class="page-container">
    <?php include_once 'includes/header.php'; ?>

    <!-- ### $App Screen Content ### -->
    <main class='main-content bgc-grey-100'>
      <div id='mainContent'>
        <div class="container-fluid">
          <h4 class="c-grey-900 mT-10 mB-30 text-center fw-bolder">Funny Fill In</h4>
          <div class="row">
            <div class="col-md-12">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end m-5">
                <button type="button" class="btn btn-outline-secondary p-5 fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">Secondary</button>
              </div>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- <h6 class="c-grey-900">Complex Form Layout</h6> -->
                      <div class="mT-30">
                        <form>
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label class="form-label" for="inputEmail4">Story title</label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="mb-3 col-md-6">
                              <label class="form-label" for="inputPassword4">Password</label>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label class="form-label" for="inputCity">City</label>
                              <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="mb-3 col-md-4">
                              <label class="form-label" for="inputState">State</label>
                              <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="mb-3 col-md-2">
                              <label class="form-label" for="inputZip">Zip</label>
                              <input type="text" class="form-control" id="inputZip">
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-6">
                              <label class="form-label fw-500">Birthdate</label>
                              <div class="timepicker-input input-icon mb-3">
                                <div class="input-group">
                                  <div class="input-group-text bgc-white bd bdwR-0">
                                    <i class="ti-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control bdc-grey-200 start-date" placeholder="Datepicker" data-provide="datepicker">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                              <input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer">
                              <label for="inputCall2" class="form-label peers peer-greed js-sb ai-c">
                                <span class="peer peer-greed">Call John for Dinner</span>
                              </label>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary btn-color">Sign in</button>
                        </form>
                      </div>
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Save changes</button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
          <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Story Thumbnail</th>
                <th>story</th>
                <th>total hint</th>
                <th>Action</th>
                <!-- <th>Salary</th> -->
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td><span class="dropdown dropstart">
                    <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                      <i class="c-blue-500 ti-more"></i></a>
                    <span class="dropdown-menu" aria-labelledby="courseDropdown"><span class="dropdown-header">Action</span>
                      <a class="dropdown-item" href="#modaleditquiz19" data-bs-toggle="modal" data-bs-target="#modaleditquiz19"><i class="fe fe-folder-plus dropdown-item-icon text-primary"></i>Update</a>

                      <a class="dropdown-item" href="industry-function.php?delete_crt=19" title="Delete Course" onclick="if (!window.__cfRLUnblockHandlers) return false; return deletecourse()" data-cf-modified-4744f88afe32a84653640c5c-><i class="fe fe-trash dropdown-item-icon text-danger"></i>Delete</a>
                      <a class="dropdown-item" href="pages-career_readiness-assessment-quiz.php?pt_id=19" title="Delete Course"><i class="fe fe-trash dropdown-item-icon text-danger"></i>Questions</a>
                    </span>
                  </span></td>
                < </tr>
              <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>

              </tr>

              <tr>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012/12/18</td>

              </tr>
              <tr>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010/03/17</td>

              </tr>
              <tr>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>2012/11/27</td>

              </tr>
              <tr>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010/06/09</td>

              </tr>
              <tr>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>2009/04/10</td>

              </tr>
              <tr>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>2012/10/13</td>

              </tr>
              <tr>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012/09/26</td>

              </tr>
              <tr>
                <td>Jenette Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>2011/09/03</td>

              </tr>
              <tr>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>2009/06/25</td>

              </tr>
              <tr>
                <td>Caesar Vance</td>
                <td>Pre-Sales Support</td>
                <td>New York</td>
                <td>21</td>
                <td>2011/12/12</td>

              </tr>
              <tr>
                <td>Doris Wilder</td>
                <td>Sales Assistant</td>
                <td>Sidney</td>
                <td>23</td>
                <td>2010/09/20</td>

              </tr>
              <tr>
                <td>Angelica Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
                <td>London</td>
                <td>47</td>
                <td>2009/10/09</td>

              </tr>
              <tr>
                <td>Gavin Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>2010/12/22</td>

              </tr>
              <tr>
                <td>Jennifer Chang</td>
                <td>Regional Director</td>
                <td>Singapore</td>
                <td>28</td>
                <td>2010/11/14</td>

              </tr>

            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
</div>
</main>
<?php
include_once 'includes/footer.php'
?>