class UI {

  constructor() {
    this.posts = document.getElementById('post-display'); //target the div tag with the id post-display
    this.titleInput = document.getElementById('post-title');
    this.bodyInput = document.getElementById('post-body');
    this.idInput = document.getElementById('id');
  }

  //This method will show the messages typed in our website
  showPost(results) {

    let output = '';
    results.forEach(result => {

      //we later use result.id to do operations such as deletion
      output += ` 

        <div class="container">

        <h4 class="title">${result.title}</h4>
        <p class="subtile">${result.body}</p>

        <a href="#" class="edit-post card-link" data-id="${result.id}">
        <i class="fas fa-edit"></i>
        </a>
        <a href="#" class="delete-post card-link" data-id="${result.id}">
        <i class="far fa-trash-alt"></i>
        </a>
      </div>
     <br>
        `;

    });

    this.posts.innerHTML = output;

  }


  //This method will show an alert in our website when something goes wrong
  showAlert(message, className1, className2) {

    // Create a Div tag
    const div = document.createElement('div'); 

    // Add Class className1 to the div tag
    div.className = className1;

    // Add Txt
    div.appendChild(document.createTextNode(message));


    // Get element
    const container = document.getElementById('errContainer');

    container.className = className2;

    // Get  err title
    const errTitle = document.querySelector('.errTitle');

    // Insert alert div
    container.insertBefore(div, errTitle);

    // Time out
    setTimeout(() => {

      document.querySelector('.message-body').remove();
    }, 3000);

  }


  formFill(data) {

    this.idInput.value = data.id;
    this.titleInput.value = data.title;
    this.bodyInput.value = data.body;
  }

}