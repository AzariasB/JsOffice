

<form name="compForm" method="post" action="sample.php" onsubmit="if (validateMode()) {
            this.myDoc.value = oDoc.innerHTML;
            return true;
        }
        return false;">
    <input type="hidden" name="myDoc">
    <div id="toolBar1">
        <select onchange="formatDoc('formatblock', this[this.selectedIndex].value);
                this.selectedIndex = 0;">
            <option selected>- formatting -</option>
            <option value="h1">Title 1 &lt;h1&gt;</option>
            <option value="h2">Title 2 &lt;h2&gt;</option>
            <option value="h3">Title 3 &lt;h3&gt;</option>
            <option value="h4">Title 4 &lt;h4&gt;</option>
            <option value="h5">Title 5 &lt;h5&gt;</option>
            <option value="h6">Subtitle &lt;h6&gt;</option>
            <option value="p">Paragraph &lt;p&gt;</option>
            <option value="pre">Preformatted &lt;pre&gt;</option>
        </select>
        <select onchange="formatDoc('fontname', this[this.selectedIndex].value);
                this.selectedIndex = 0;">
            <option class="heading" selected>- font -</option>
            <option>Arial</option>
            <option>Arial Black</option>
            <option>Courier New</option>
            <option>Times New Roman</option>
        </select>
        <select onchange="formatDoc('fontsize', this[this.selectedIndex].value);
                this.selectedIndex = 0;">
            <option class="heading" selected>- size -</option>
            <option value="1">Very small</option>
            <option value="2">A bit small</option>
            <option value="3">Normal</option>
            <option value="4">Medium-large</option>
            <option value="5">Big</option>
            <option value="6">Very big</option>
            <option value="7">Maximum</option>
        </select>
        <select onchange="formatDoc('forecolor', this[this.selectedIndex].value);
                this.selectedIndex = 0;">
            <option class="heading" selected>- color -</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
            <option value="black">Black</option>
        </select>
        <select onchange="formatDoc('backcolor', this[this.selectedIndex].value);
                this.selectedIndex = 0;">
            <option class="heading" selected>- background -</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="black">Black</option>
        </select>
    </div>
    <div id="toolBar2">
        <span class="intLink fa fa-paint-brush" title="Clean" onclick="
                if (validateMode() && confirm('Are you sure?')) {
                    oDoc.innerHTML = sDefTxt
                }
                ;"></span>
        <span class="intLink fa fa-print " title="Print" onclick="printDoc();"></span>
        <span class="intLink fa fa-undo" title="Undo" onclick="formatDoc('undo');"></span>
        <span class="intLink fa fa-repeat" title="Redo" onclick="formatDoc('redo');" ></span>
        <span class="intLink fa fa-eraser" title="Remove formatting" onclick="formatDoc('removeFormat')"></span>
        <span class="intLink fa fa-bold" title="Bold" onclick="formatDoc('bold');" ></span>
        <span class="intLink fa fa-italic" title="Italic" onclick="formatDoc('italic');" ></span>
        <span class="intLink fa fa-underline" title="Underline" onclick="formatDoc('underline');" ></span>
        <span class="intLink fa fa-align-left" title="Left align" onclick="formatDoc('justifyleft');"></span>
        <span class="intLink" title="Center align" onclick="formatDoc('justifycenter');"></span>
        <span class="intLink fa fa-align-right" title="Right align" onclick="formatDoc('justifyright');" ></span>
        <span class="intLink fa fa-list-ol" title="Numbered list" onclick="formatDoc('insertorderedlist');" ></span>
        <span class="intLink fa fa-list-ul" title="Dotted list" onclick="formatDoc('insertunorderedlist');"w==" ></span>
        <span class="intLink fa fa-quote-left" title="Quote" onclick="formatDoc('formatblock', 'blockquote');" ></span>
        <span class="intLink fa fa-outdent" title="Add indentation" onclick="formatDoc('outdent');"></span>
        <span class="intLink fa fa-indent" title="Delete indentation" onclick="formatDoc('indent');" ></span>
        <span class="intLink fa fa-link" title="Hyperlink" onclick="var sLnk = prompt('Write the URL here', 'http:\/\/');
                if (sLnk && sLnk != '' && sLnk != 'http://') {
                    formatDoc('createlink', sLnk)
                }" ></span>
        <span class="intLink fa fa-cut" title="Cut" onclick="formatDoc('cut');" ></span>
        <span class="intLink fa fa-copy" title="Copy" onclick="formatDoc('copy');" ></span>
        <span class="intLink fa fa-paste" title="Paste" onclick="formatDoc('paste');"></span>
    </div>
    <div id="textBox" contenteditable="true"><p>Lorem ipsum</p></div>
    <p id="editMode"><input type="checkbox" name="switchMode" id="switchBox" onchange="setDocMode(this.checked);" /> <label for="switchBox">Show HTML</label></p>
    <p><input type="submit" value="Send" /></p>
</form>