window.onload = function () {
    const entryContent = document.querySelector('#primary > article > .entry-content');
    const tocWidget = document.querySelector('#sidebar-toc-widget');
    const tocContent = document.querySelector('#sidebar-toc-content');
    const pageToc = document.querySelector('#toc-inner');
    const pageTocContent = document.querySelector('#toc-inner-content');
    let toc = "";
    let level = 0;
    const hRegex = /<h([\d])>([^<]+)<\/h([\d])>/gi;

    // console.log(entryContent.innerHTML.search(hRegex))
    if(entryContent.innerHTML.search(hRegex) < 0) {
        return;
    }

    // Display widget if no headings are found in entryContent.
    if(tocWidget) {
        tocWidget.classList.remove('d-none')
    }
    if(pageToc) {
        // Add d-sm-block intead since it defaults to d-none for mobile.
        pageToc.classList.add('d-sm-block')
    }

    // Add ID to each heading.
    entryContent.innerHTML =
        entryContent.innerHTML.replace(
            hRegex,
            function (str, openLevel, titleText, closeLevel) {
                if (openLevel !== closeLevel) {
                    return str;
                }

                // Wrap with <ul> tags.
                // if (openLevel > level) {
                //     toc += (new Array(openLevel - level + 1)).join('<ul class="list-group list-group-flush">');
                // } else if (openLevel < level) {
                //     toc += (new Array(level - openLevel + 1)).join('</ul>');
                // }

                level = parseInt(openLevel);

                let anchor = titleText.replace(/ /g, "_");
                toc += '<a class="list-group-item list-group-item-action bg-transparent" href="#' + anchor + '">' + titleText
                    + '</a>';

                return `<h${openLevel} id="${anchor}">${titleText}</h${closeLevel}>`;
            }
        );

    // Add last closing </ul>.
    // if (level) {
    //     toc += (new Array(level + 1)).join("</ul>");
    // }

    // Append table of contents items
    if(tocWidget) {
        tocContent.innerHTML += toc;
    }
    if(pageToc) {
        pageTocContent.innerHTML += toc;
    }

};
