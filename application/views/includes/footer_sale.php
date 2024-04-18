




<div id="dialog" style="display: none;">
        Something is wrong... pls check...
    </div>

        <div class="modal" id="modalAjaxErrorMsg" role="dialog" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header" style="background: #D9534f; color: #fff;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ERROR</h4>
          </div>
          <div class="modal-body">
            <p id="paraAjaxErrorMsg"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"> OK </button>
          </div>
        </div>
      </div>
    </div>

    
<script type="text/javascript">
    
function newInvoice(){
    window.location = base_url + '/Sale_Controller'; 
    
}

function newQuote(){
    window.location = base_url + '/Sale_Controller/quote'; 
    
}
        //high lighting selected row
        $("#tbl1 tr").on("click", highlightRow);
        function highlightRow()
        {
            var tableObject = $(this).parent();
            // if($(this).index() > 0)
            {
                var selected = $(this).hasClass("highlight");
                tableObject.children().removeClass("highlight");
                if(!selected)
                    $(this).addClass("highlight");
            }
        }




        function highlightRowAlag()
        {
            var tableObject = $(this).parent();
            // if($(this).index() > 0)
            {
                var selected = $(this).hasClass("highlightAlag");
                tableObject.children().removeClass("highlightAlag");
                if(!selected)
                    $(this).addClass("highlightAlag");
            }
        }

        // $(document).prop('title', ": " + vModuleName);
    </script>


  <script type="text/javascript">
    $(document).ready(function()
    {
        $(this).dblclick(function(e){
            if(e.shiftKey && e.ctrlKey  && e.altKey)
            {
                unhideTd();
            }
            
        })
        // msgBoxError("Error", "Invalid Input...");
        // msgBoxDone("Done", "Saved...");
        $(this).keydown(function(e){
            if(e.keyCode == 113)
            {
                e.preventDefault();
                $("#txtMenuEval").focus();
                // alert(e.keyCode);
            }
            if(e.keyCode == 27)
            {
                e.preventDefault();
                $("#txtMenuEval").val('');
                $("#txtMenuEvalResult").val('');
                // alert(e.keyCode);
            }
            
            
        })
    });

    function unhideTd()
    {
        $("table").each(function(){
            //////Unhide TH
            $(this).find("tr th").each(function(){
                if( $(this).css("display") == "none" )
                {
                    $(this).css("display", "block");
                }
            });

            //////Unhide TD
            $(this).find("tr td").each(function(){
                if( $(this).css("display") == "none" )
                {
                    $(this).css("display", "block");
                }
            });
        });
    }
  </script>

    <div id="msgBox" title="Download complete" style="display: none;">
      <p>
        <span id="msgBoxIcon" class="glyphicon glyphicon-menu-hamburger" style="float:left; margin:0 7px 50px 0;font-size: 20pt;"></span>
        <span id="msgBoxPrompt" style="padding-top:40px;">Prompt</span>
      </p>
    </div>
    <style type="text/css">
        .ui-dialog-buttonset .green{
            background: green;
            color:white;
        }
        .ui-dialog-buttonset .red{
            background: red;
            color:white;
        }
    </style>
    <script>
      function msgBoxError(title, prompt) {
        $( "#msgBox" ).attr("title",title);
        $( "#msgBoxIcon" ).css({'font-size':'30pt','float':'left', 'margin':'1px 15px 30px 0', 'color': 'red'});
        $( "#msgBoxIcon" ).attr("class","glyphicon glyphicon-remove-circle");
        $( "#msgBoxPrompt" ).text(prompt);

        $( "#msgBox" ).dialog({
          modal: true,
          buttons: [
                {
                    text:'OK',
                    class:'red',
                    click: function() {
                        $(this).dialog("close");                        
                    }                   
                }
            ]
          
        }).prev(".ui-dialog-titlebar").css("background",'red');
      };

      function msgBoxDone(title, prompt) {
        $( "#msgBox" ).attr("title",title);
        $( "#msgBoxIcon" ).css({'font-size':'30pt','float':'left', 'margin':'1px 15px 30px 0', 'color': 'green'});
        $( "#msgBoxIcon" ).attr("class","glyphicon glyphicon-ok-circle");
        $( "#msgBoxPrompt" ).text(prompt);

        $( "#msgBox" ).dialog({
          modal: true,
          buttons: [
                {
                    text:'OK',
                    class:'green',
                    click: function() {
                        $(this).dialog("close");                        
                    }                   
                }
            ]
          
        }).prev(".ui-dialog-titlebar").css("background",'green');
      };

      </script>



</div>
    </body>

<!-- <footer class="main-footer" style="margin-left: -24px;">
        <strong><?php //echo COPYRIGHTS; ?></strong>
    </footer>
    <div class="control-sidebar-bg"></div>
 -->



    
</html>
    








<div id="divPrint" style="color: white;">
</div>



<div id="divHeader" class="header"></div>
<div id="divFooter" class="footer"></div>

