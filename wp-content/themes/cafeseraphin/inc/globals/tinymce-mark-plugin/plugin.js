(function () {
  tinymce.PluginManager.add("heading_highlight", function (editor, url) {
    editor.on("init", function () {
      editor.formatter.register("heading-highlight", {
        inline: "mark",
        classes: "heading-highlight",
      });
    });

    var svgIcon =
      '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 -960 960 960"><path d="M84.8-7v-111.9h790.3v112H84.9Zm467-450L449.6-559.4 301.2-410q-3.7 3.4-3.7 8.4t3.7 8.5l85.1 84.6q3.5 3.5 8.5 3.5t8.5-3.5L551.9-457Zm-62.3-142 102.1 102.2 187.7-187.6q3.5-3.5 3.5-8.8t-3.5-9l-85-85q-3.6-3.4-8.9-3.4-5.3 0-8.8 3.5l-187 188Zm-59.7-20.1 181.6 181.5-168 168.2Q422.6-249 394.1-249q-28.6 0-49.2-20.5l-5-5-37.4 36.6H157l110-110.7-4.2-4.4q-20.8-20.2-20.9-49-.2-28.8 20.4-49.4l167.5-167.8Zm0 0 209.1-209q20-20 48-19.6 28.1.4 47.7 20.5l84.7 85.1q20 20.6 20 48.6t-20 48.1l-208 207.8L430-619.1Z"/></svg>';

    // Find parent highlighted mark of an element
    function findHighlightMark(element) {
      while (element && element.nodeName !== "BODY") {
        if (
          element.nodeName === "MARK" &&
          element.className.indexOf("heading-highlight") !== -1
        ) {
          return element;
        }
        element = element.parentNode;
      }
      return null;
    }

    // Custom toggle function to handle both adding and removing correctly
    function toggleHighlight() {
      var selection = editor.selection;
      var node = selection.getNode();

      // Check if we're inside a highlighted mark
      var highlightMark = findHighlightMark(node);

      if (highlightMark) {
        // We are inside a highlight mark, so we need to remove it
        var parent = highlightMark.parentNode;
        var fragment = document.createDocumentFragment();

        // Move all children of the mark to the fragment
        while (highlightMark.firstChild) {
          fragment.appendChild(highlightMark.firstChild);
        }

        // Insert all the contents before the mark
        parent.insertBefore(fragment, highlightMark);

        // Remove the now-empty mark
        parent.removeChild(highlightMark);

        // Ensure the selection is maintained
        selection.select(node);
      } else {
        // We are not in a highlight mark, so apply the formatting
        editor.formatter.apply("heading-highlight");
      }
    }

    editor.addButton("heading-highlight", {
      title: "Heading Highlight",
      type: "button",
      icon: false,
      text: "",
      onclick: function () {
        toggleHighlight();
      },
      onPostRender: function (e) {
        var btnElm = e.target.getEl();
        var iconElm = document.createElement("button");
        iconElm.innerHTML = svgIcon;
        iconElm.style.display = "inline-grid";
        iconElm.style.placeItems = "center";
        iconElm.style.width = "26px";
        iconElm.style.height = "24px";

        btnElm.innerHTML = "";
        btnElm.appendChild(iconElm);

        var ctrl = this;
        editor.on("NodeChange", function (e) {
          // Check if we're inside a highlighted mark
          var highlightMark = findHighlightMark(e.element);
          ctrl.active(!!highlightMark);
        });
      },
    });
  });
})();