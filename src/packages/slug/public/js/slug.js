(()=>{function e(e,a){for(var l=0;l<a.length;l++){var n=a[l];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}var a=function(){function a(){!function(e,a){if(!(e instanceof a))throw new TypeError("Cannot call a class as a function")}(this,a)}var l,n;return l=a,(n=[{key:"init",value:function(){$(document).on("click","#change_slug",(function(e){$(".default-slug").unwrap();var a=$("#editable-post-name");a.html('<input type="text" id="new-post-slug" class="form-control" value="'+a.text()+'" autocomplete="off">'),$("#edit-slug-box .cancel").show(),$("#edit-slug-box .save").show(),$(e.currentTarget).hide()})),$(document).on("click","#edit-slug-box .cancel",(function(){var e=$("#current-slug").val(),a=$("#sample-permalink");a.html('<a class="permalink" href="'+$("#slug_id").data("view")+e.replace("/","")+'">'+a.html()+"</a>"),$("#editable-post-name").text(e),$("#edit-slug-box .cancel").hide(),$("#edit-slug-box .save").hide(),$("#change_slug").show()}));var e=function(e,a,l){$.ajax({url:$("#slug_id").data("url"),type:"POST",data:{name:e,slug_id:a,model:$("input[name=model]").val()},success:function(e){var a=$("#sample-permalink"),n=$("#slug_id");l?a.find(".permalink").prop("href",n.data("view")+e.replace("/","")):a.html('<a class="permalink" target="_blank" href="'+n.data("view")+e.replace("/","")+'">'+a.html()+"</a>"),$(".page-url-seo p").text(n.data("view")+e.replace("/","")),$("#editable-post-name").text(e),$("#current-slug").val(e),$("#edit-slug-box .cancel").hide(),$("#edit-slug-box .save").hide(),$("#change_slug").show(),$("#edit-slug-box").removeClass("hidden")},error:function(e){Haitech.handleError(e)}})};$(document).on("click","#edit-slug-box .save",(function(){var a=$("#new-post-slug"),l=a.val(),n=$("#slug_id").data("id");null==n&&(n=0),null!=l&&""!==l?e(l,n,!1):a.closest(".form-group").addClass("has-error")})),$(document).on("blur","#name",(function(a){if($("#edit-slug-box").hasClass("hidden")){var l=$(a.currentTarget).val();null!==l&&""!==l&&e(l,0,!0)}}))}}])&&e(l.prototype,n),a}();$((function(){(new a).init()}))})();
