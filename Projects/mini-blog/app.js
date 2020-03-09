// Init Http library
const http = new BasicHTTP(); //creating an instance of the class BasicHTTP in http.js

// Init UI
const ui = new UI();

// Get Posts on Dom load
document.addEventListener('DOMContentLoaded', getposts());

// Post Submit
const postSubmit = document.getElementById('post-submit');

// Listen for delete
document.getElementById('post-display').addEventListener('click', deletePost);

// Listen for Update
document.getElementById('post-display').addEventListener('click', updatePost);

// Add event listener for the Add Post button
postSubmit.addEventListener('click', e => {

  // Get Inputs values
  const postTitle = document.getElementById('post-title').value; //title
  const postbody = document.getElementById('post-body').value; //body
  const id = document.getElementById('id').value; //id

  console.log(postTitle, '', postbody);


  //creating constants to use our text
  const post = {

    title: postTitle,
    body: postbody

  }


  // check if fields are empty
  if (post.title === '' || post.body === '') {
    //calling the showAlert method if either fields are empty
    ui.showAlert('Please check input fields', 'message-body', 'message is-danger');

  } else {


    if (id === '') {

      // Create Post
      http.post('http://localhost:3000/posts', post)
        .then((results) => {

          ui.showAlert('Post Added', 'message-body', 'message is-success'); //show a success alert 
          var delayInMilliseconds = 2000; //2 second
          //waiting for two seconds then refreshing the page
          setTimeout(function () {
            //your code to be executed after 2 second
            window.location.reload();
          }, delayInMilliseconds);


        }).catch(err => console.log(err));

    } else {

      // Update Post

      http.put(`http://localhost:3000/posts/${id}`, post)
        .then(results => {

          ui.showAlert('Post Updated ', 'message-body', 'message is-success');
          var delayInMilliseconds = 2000; //2 second
          //waiting for two seconds then refreshing the page
          setTimeout(function () {
            //your code to be executed after 2 second
            window.location.reload();
          }, delayInMilliseconds);
        })
        .catch(err => console.log(err)); //printing in console if we got any error



    }

  }

  e.preventDefault();

});





// Get Post Function (In here we are trying to contact our http library)
function getposts() {

  http.get('http://localhost:3000/posts')
    .then((result) => {
      ui.showPost(result);
    }).catch((err) => {
      console.log(err); //if any, print the error in the console
    });

}

// This method help us to delete the posts from our db.json and show the results in our website
function deletePost(event) {


  //checking if delete-post is in the classList of the message which triggered the event
  const deleteid = event.target.parentElement.classList.contains("delete-post");
  if (deleteid == true) {
    //targeting the id that we set in ui.js
    const id = event.target.parentElement.dataset.id;

    //showing an alert message to confirm deleting
    if (confirm('Do you want to delete this Post?')) {

      // Delete Post
      http.delete(`http://localhost:3000/posts/${id}`)
        .then(result => {

          ui.showAlert('Post Deleted', 'message-body', 'message is-success');
          getposts();

        }).catch(err => {

          console.log(err);
        });

    }

  }

  event.preventDefault();
}


// This method help us to update or edit the posts in our website
function updatePost(event) {

  if (event.target.parentElement.classList.contains('edit-post')) {
    const id = event.target.parentElement.dataset.id;
    const title = event.target.parentElement.previousElementSibling.previousElementSibling.textContent;
    const body = event.target.parentNode.previousElementSibling.textContent;

    const posts = {

      id,
      title,
      body
    }

    ui.formFill(posts);

  }

  event.preventDefault();
}


