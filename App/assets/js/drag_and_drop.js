let dropArea = document.getElementById('drop-area')

// Prevent default drag behaviors
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
})
;['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, unhighlight, false)
})

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false)

function preventDefaults(e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('highlight')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}

let input = document.getElementById('fileElem')

input.addEventListener('change', handleFiles, false)

function handleFiles(files) {
  ;[...files].forEach(uploadFile)
}

function uploadFile(file) {
  let url = 'file-upload-url'
  let formData = new FormData()

  formData.append('file', file)

  fetch(url, {
    method: 'POST',
    body: formData
  })
    .then(() => {
      /* handle success */
    })
    .catch(() => {
      /* handle error */
    })
}

// DRAG and DROP funcionando
const fileDropArea = document.getElementById('file-drop-area')
const fileInput = document.getElementById('file-input')

fileDropArea.addEventListener('dragover', handleDragOver, false)
fileDropArea.addEventListener('drop', handleFileSelect, false)
fileInput.addEventListener('change', handleFileSelect, false)

function handleDragOver(event) {
  event.stopPropagation()
  event.preventDefault()
  fileDropArea.classList.add('drag-over')
}

function handleFileSelect(event) {
  event.stopPropagation()
  event.preventDefault()
  fileDropArea.classList.remove('drag-over')

  const files = event.dataTransfer
    ? event.dataTransfer.files
    : event.target.files
  for (let i = 0; i < files.length; i++) {
    console.log(files[i].name)
  }
}
