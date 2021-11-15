var count = 0;

function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("childID", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();

  const id = ev.dataTransfer.getData("childID");

  if (id.startsWith("dragged") || !id) {
    return;
  }

  const nodeCopy = document.getElementById(id).cloneNode(true);

  nodeCopy.id = "dragged" + id + count++;

  nodeCopy.addEventListener("dragstart", drag);

  ev.target.appendChild(nodeCopy);
}

function deleteDiv(ev) {
  ev.preventDefault();

  const id = ev.dataTransfer.getData("childID");

  if (!id.startsWith("dragged")) {
    return;
  }
  const el = document.getElementById(id);
  el.parentNode.removeChild(el);
}