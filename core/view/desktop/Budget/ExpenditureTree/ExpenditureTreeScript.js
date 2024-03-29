document.addEventListener('DOMContentLoaded', async function() {
    // await showTree();
});



  function markChildren(parent){
    console.log(parent);
    p = parent.querySelectorAll('input[type="checkbox"]')
    p.forEach(element => {
      element.checked = !element.checked
    });
  };



  async function showTree() {
    const option = {
      method: "POST",
      headers: {
        'Content-Type': 'application/json'
      },
    }
    console.log(option);

    const response = await fetch("/expendituretree", option);

    //Если статус 200 - 299
    if (response.ok) {
      const result = await response.text();
      Swal.fire({
        showCancelButton: true,
        confirmButtonText: `Сохранить`,
        cancelButtonText: "Отмена",
        html: result,
        width: "600px",
        preConfirm: async () => {
          let formData = new FormData(
            document.querySelector("#expenditureTree")
          );

          const option = {
            method: "post",
            body: formData,
          };
          console.log(formData);
          const response = await fetch("/bankescrow-list?action=bankescrow.generate.do", option);
          if (response.ok) {
            const res = await response.text();
            location.reload()
            /* if (res != null) {
              Swal.fire({
                title: "Успешно",
                text: "Копирование успешно завершено.",
                icon: "success",
                preConfirm: () => {
                  location.reload();
                },
              });
            } else {
              Swal.fire("Ошибка", "При копировании произошла ошибка.", "error");
            } */
          }
        },
      });
    }
  }




  function tree_toggle(event) {
    event = event || window.event
    var clickedElem = event.target || event.srcElement

    if (!hasClass(clickedElem, 'Expand')) {
      return // клик не там
    }

    // Node, на который кликнули
    var node = clickedElem.parentNode
    if (hasClass(node, 'ExpandLeaf')) {
      return // клик на листе
    }

    // определить новый класс для узла
    var newClass = hasClass(node, 'ExpandOpen') ? 'ExpandClosed' : 'ExpandOpen'
    // заменить текущий класс на newClass
    // регексп находит отдельно стоящий open|close и меняет на newClass
    var re = /(^|\s)(ExpandOpen|ExpandClosed)(\s|$)/
    node.className = node.className.replace(re, '$1' + newClass + '$3')
  }


  function hasClass(elem, className) {
    return new RegExp("(^|\\s)" + className + "(\\s|$)").test(elem.className)
  }

  var treeParent = document.getElementsByClassName("tree_parent");
for (var i = 0; i < treeParent.length; i++) {
  treeParent[i].addEventListener("click", checkChildrenHandler);
}
function checkChildrenHandler() {
  checkChildren(this);
}


/* function checkboxClick(parent,checkboxes) {
	if($(parent).is(':checked')) {
		$(checkboxes).prop('checked', true);
	} else {
		$(checkboxes).prop('checked', false);
	}	
} */


