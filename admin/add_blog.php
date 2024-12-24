<?php
include('function/function.php');
include_once 'includes/head.php';

$folder_url = BASE_URL."assets/images/blogs/";
?>
<?php
include_once 'includes/sidebar.php';

?>
<style>
  #para_graph{
  }
  .ck-content{
    min-height: 150px;
    margin-bottom: 10px;
  }
</style>
<!-- #Main ============================ -->
<div class="page-container">
  <?php include_once 'includes/header.php'; ?>
  <main class='main-content bgc-grey-100'>
    <div class="container-fluid">
      <!-- START Of Magazine Header  -->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <!-- Page Header -->
          <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
            <div class="mb-3 mb-md-0">
              <h1 class="mb-1 h2 fw-bold">Add Blog</h1>
            </div>
           
          </div>
        </div>
       
    <!-- START OF Table content DATA  -->
    <div class="row">
      <div class="col-md-12 col-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
          <div class="row">
          <div class="modal-body">
                <form action="" method="POST" onsubmit="formValidate(event)" enctype="multipart/form-data" id="blogform">
                  <!-- Title -->
                  <div class="row">
                    <div class="mb-3 col-md-8">
                      <label for="title" class="form-label">Blog Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                      
                    </div>
                    <div class="mb-3 col-md-4">
                      <label for="category" class="form-label">Blog Category</label>
                      <select class="form-select" id="category" name="category" required>
                      <option value=''>Select category</option>
                        <?php
                        // Your database connection code (e.g., $mysqli) goes here

                        // Query to fetch categories
                        $categoryQuery = "SELECT category_id, name FROM blog_categories WHERE status = 1";
                        $categoryResult = $mysqli->query($categoryQuery);

                        if ($categoryResult && $categoryResult->num_rows > 0) {
                          while ($categoryRow = $categoryResult->fetch_assoc()) {
                            $category_id = $categoryRow['category_id'];
                            $category_name = $categoryRow['name'];
                            echo "<option value=\"$category_id\">$category_name</option>";
                          }
                        } else {
                          echo "<option value=''>No categories available</option>";
                        }

                        // Close the database connection
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="coverImage" class="form-label">Published By</label>
                      <input type="text" class="form-control" placeholder="Enter Publisher" id="published_by" name="published_by" required>
                    </div>
                    <div class="mb-3 col-md-6">
                    <label for="date" class="form-label">Published Date</label>
                      <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" id="date" name="published_date" >
                    </div>
                  </div>


                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="coverImage" class="form-label">Blog thumbnail Image *(.png, .webp, .jpg)</label>
                      <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="status" class="form-label">Status</label>
                      <select class="form-select" id="status" name="status" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                  </div>
                  
                  <!-- Add More Button -->
                 
                  
                 
              </div>

          </div>
          <div class="row"> 
          <h3 class="col-md-8">Preview</h3> <h3 class="col-md-3 mx-5">Controls</h3>
          <div class="col-md-8 border">
            
            <!-- <hr class="hr" /> -->
            <div id="blog-preview" class="mt-2 p-2">
              
            </div>
          </div>
          <div class="col-md-4 border">
            
            <div class="p-3">
            <div class="mb-2">
              <input class="form-control mb-2" id="sub_head"> 
              <button type="button" onclick="addSubHeading()"  class="btn btn-info btn-sm">Add Sub Heading</button>
            </div>
            <div class="mb-2">
              <textarea class="form-control mb-2" id="para_graph" rows="10"> </textarea>
              <button type="button" onclick="addParagraph()" class="btn btn-info btn-sm">Add Paragraph</button>
            </div>
            <div class="mb-2 mt-2 pt-2">
                      <input type="file" onchange="addImage(this)" id="img_file" class="form-control" />
            </div>
            <small><em>Double click on element to remove from preview</em></small>
                <div class="mt-5">
                    <!-- <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-success btn-sm input-block-level" name="add_blog">Save Blog</button>
                </div>
                </form>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END OF Table content DATA  -->
</div>
</main>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
  let editor;
    ClassicEditor
        .create( document.querySelector( '#para_graph' ) )
        .then( newEditor => {
        editor = newEditor;
      } )
        .catch( error => {
            console.error( error );
        } );
                       

          let preview = document.getElementById('blog-preview');
          const addSubHeading = () =>{
            // console.log("here");
            let head = document.getElementById('sub_head');
            if(head.value.trim()==''){
              alert('Enter Sub Heading');
              head.focus();
              return false;
            }
            // console.log(head.value);
            preview.innerHTML += `<h4 class='py-2 display-7 fw-bolder temp'>${head.value.trim()} </h4>`
            head.value='';
            removeItem()
          }

          
          const addParagraph = () =>{
            // console.log("here1");
            let para = document.getElementsByClassName('ck-content')[0];
            const data = editor.getData();
            console.log(data);
            // return false
            if(data == ''){
              alert('Enter Text');
              para.focus();
              return false;
            }
            preview.innerHTML += `<div class='community-text py-1 article-title temp'>${data} </div>`
            // para.innerHTML='';
            editor.setData( '' );
            removeItem()
          }
          
          const addImage = (obj) =>{
            if(!obj.files[0]){
              return false
            }
            // console.log(obj.files[0]);
            let image = obj.files[0];

            if(!image.type.includes('image/')){
              alert('Please upload image only');
              obj.value='';
              return false;
            }

            let formData = new FormData();
            formData.append("image",image);
            let url = "process_blog_img.php";
            fetch(url,{
              method: "POST",
              body: formData
            }).then(data=>data.text()).then(data=>{
              preview.innerHTML += `<img src='<?= $folder_url ?>${data}' width="100%"  class='img-fluid temp' alt='blog image'>`
              obj.value='';
              removeItem()
            });
          }
          preview.addEventListener('dblclick',function(){
            
          })
          
          const removeItem = () =>{
            let temps = document.querySelectorAll('.temp');
          temps.forEach(item=>{
            item.addEventListener('dblclick',function(){
              // removeItem(this);
              if(!confirm('Are you sure you want to remove this element')){
                return false;
              }
              this.remove();
            })
          })
          }


          const formValidate = (e) =>{
              e.preventDefault();
              // console.log("there");
              //  console.log(e.target);
               let form = document.getElementById('blogform');
               let formdata = new FormData(form);

               formdata.append('content',preview.innerHTML);

              let url = 'manage_blog.php?add_blog=yes';
// console.log("here saving")
              fetch(url,{
                method: "POST",
                body: formdata
              }).then(data=>data.text()).then(data=>{
                // console.log(data)
                if(data=='Blog added successfully'){
                  alert(data);
                  window.location.href='blog';
                }
              })

          }
</script>
<?php
include_once 'includes/footer.php';
// $mysqli->close();
?>