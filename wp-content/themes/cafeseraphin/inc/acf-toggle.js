document.addEventListener('DOMContentLoaded', function() {
  // Fonction pour gérer l'état
  function toggleOtherGroup() {
    const isExternalCheckbox = document.querySelector('[data-key="field_single-fund_external"] input[type="checkbox"]');
    const otherGroup = document.getElementById('acf-data_flexible-fund');

    if (!isExternalCheckbox || !otherGroup) return;

    if (isExternalCheckbox.checked) {
      // Si activé, masquer le groupe cible
      otherGroup.style.display = 'none';
    } else {
      // Sinon, afficher le groupe cible
      otherGroup.style.display = 'block';
    }
  }

  // Déclencher au chargement
  toggleOtherGroup();

  // Déclencher au clic sur le switch
  const isExternalCheckbox = document.querySelector('[data-key="field_single-fund_external"] input[type="checkbox"]');
  if (isExternalCheckbox) {
    isExternalCheckbox.addEventListener('change', toggleOtherGroup);
  }


  const observer = new MutationObserver((mutationsList) => {
    for (const mutation of mutationsList) {
      if (mutation.type === 'childList') {
        mutation.addedNodes.forEach((node) => {
          if (node.nodeType === 1) console.log(node)

          if(node.nodeType === 1 && node.querySelector('.layout[data-layout="columns-third"]:not(.acf-clone)')) {

            initColumnsThird(node.querySelector('.layout[data-layout="columns-third"]:not(.acf-clone)'));
          }
        });
      }
    }
  });

  observer.observe(document.querySelector('.acf-field[data-name="flexible-layout"]'), { childList: true, subtree: true });

  const layouts = document.querySelectorAll('.layout[data-layout="columns-third"]:not(.acf-clone)');
  layouts.forEach((layout) => {
    initColumnsThird(layout);
  });

  function initColumnsThird(layout) {
//     // Cibler les colonnes à inverser dans CE layout seulement
    const col1 = layout.querySelector('.columns-third-col1');
    const col2 = layout.querySelector('.columns-third-col2');
    const reverse = layout.querySelector('.columns-third-reverse-button input[type="checkbox"]');
    

    if (!col1 || !col2 || !reverse) return;

    const parentCol = col1.parentNode;

    function handleReverseChange() {
      if (reverse.checked) {
//         // Inverser si activé
//         reverseColumns();
        parentCol.style.display = 'flex'
        parentCol.style.flexDirection = 'row-reverse'
      } else {
        parentCol.style = ''
      }
    }

//     // Déclencher tout de suite
    handleReverseChange();

//     // Sur changement
    reverse.addEventListener('change', handleReverseChange);
  }
});
