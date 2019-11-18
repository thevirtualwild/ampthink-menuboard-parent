function copy_to_clipboard(_boardId) {
  var copyId = _boardId.split('-')[1];
  var copyText = document.getElementById("goto-" + copyId);

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
