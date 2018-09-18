<div class="modal small" style="display: none;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="canceldelete()">×</button>
        <h3 id="myModalLabel">删除确认</h3>
    </div>
    <div class="modal-body">
    	<p class="error-text"><i class="icon-warning-sign modal-icon"></i>确认要删除吗</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="canceldelete()">取消</button>
        <button class="btn btn-danger" data-dismiss="modal" onclick="performdelete()">删除</button>
    </div>
    <input type="hidden" id="idfordelete"/>
</div>