// function to change what file upload(local or online) is displayed on upload form
function changeUploadType(type) {
  //get online file upload and local file upload elements on upload form
  let oFile = document.getElementById('online-file')
  let lFile = document.getElementById('local-file')
  //display local file and hide online file elements
  if (type == 'local-file') {
    oFile.style.display = 'none'
    lFile.style.display = 'block'
  }
  //display online file and hide local file elements
  if (type == 'online-file') {
    oFile.style.display = 'block'
    lFile.style.display = 'none'
  }
}

//set defualt element to display as online-file
Window.onload = changeUploadType('online-file')
