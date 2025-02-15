<script>

    //settings for sortable JS
    var group = $("#menuitems").sortable({
        group: 'serialization',
        isValidTarget: function ($item, container) {
            //for limiting the depth of the UL child
            var depth = 1, // Start with a depth of one (the element itself)
                maxDepth = 3,
                children = $item.find('ul').first().find('li');


            // Add the amount of parents to the depth
            depth += container.el.parents('ul').length;

            // Increment the depth for each time a child
            while (children.length) {
                depth++;
                children = children.find('ul').first().find('li');
            }

            return depth <= maxDepth;
        },
        onDrop: function ($item, container, _super) {
            var data = group.sortable("serialize").get();
            var jsonString = JSON.stringify(data, null, ' ');
            $('#serialize_output').text('').text(jsonString);
            //for animation
            var $clonedItem = $('<li/>').css({height: 0});
            $item.before($clonedItem);
            $clonedItem.animate({'height': '3'});

            $item.animate($clonedItem.position(), function  () {
                $clonedItem.detach();
                _super($item, container);
            });
        },
        //for animation
        onDragStart: function ($item, container, _super) {
            var offset = $item.offset(),
                pointer = container.rootGroup.pointer;

            adjustment = {
                left: pointer.left - offset.left,
                top: pointer.top - offset.top
            };

            _super($item, container);
        },
        //for animation
        onDrag: function ($item, position) {
            $item.css({
                left: position.left - adjustment.left,
                top: position.top - adjustment.top
            });
        }
    });

    function slugMaker(title, slug){
        $("#"+ title).keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp,'-');
            $("#"+slug).val(Text);
        });
    }

    $(document).ready(function () {
        var $data = group.sortable("serialize").get();
        var jsonString = JSON.stringify($data, null, ' ');
        $('#serialize_output').text('').text(jsonString);
    });

    $('#select-all-pages').click(function(event) {
        if(this.checked) {
            $('#page-list :checkbox:not(:disabled)').each(function() {
                this.checked = true;
            });
        }else{
            $('#page-list :checkbox:not(:disabled)').each(function() {
                this.checked = false;
            });
        }
    });

    $('#select-all-services').click(function(event) {
        if(this.checked) {
            $('#service-list :checkbox:not(:disabled)').each(function() {
                this.checked = true;
            });
        }else{
            $('#service-list :checkbox:not(:disabled)').each(function() {
                this.checked = false;
            });
        }
    });

    $('#select-all-blogs').click(function(event) {
        if(this.checked) {
            $('#blogs-list :checkbox:not(:disabled)').each(function() {
                this.checked = true;
            });
        }else{
            $('#blogs-list :checkbox:not(:disabled)').each(function() {
                this.checked = false;
            });
        }
    });

    @if($data['desiredMenu'])
    $('#add-pages').click(function(){
        var menuid  = "{{$data['desiredMenu']->id}}";
        var n       = $('input[name="select-page[]"]:checked').length;
        var array   = $('input[name="select-page[]"]:checked');
        var ids     = [];

        if(n == 0){
            return false;
        }

        for(var i=0;i<n;i++){
            ids[i] =  array.eq(i).val();
        }

        if(ids.length == 0){
            return false;
        }

        $.ajax({
            type:"get",
            data: {menuid:menuid,ids:ids},
            url: "{{route($base_route.'page')}}",
            success:function(res){
                location.reload();
            }
        });
    });

    $('#add-blogs').click(function(){
        var menuid  = "{{$data['desiredMenu']->id}}";
        var n       = $('input[name="select-blogs[]"]:checked').length;
        var array   = $('input[name="select-blogs[]"]:checked');
        var ids     = [];

        if(n == 0){
            return false;
        }

        for(var i=0;i<n;i++){
            ids[i] =  array.eq(i).val();
        }

        if(ids.length == 0){
            return false;
        }

        $.ajax({
            type:"get",
            data: {menuid:menuid,ids:ids},
            url: "{{route($base_route.'blog')}}",
            success:function(res){
                location.reload();
            }
        });
    });

    $('#add-service').click(function(){
        var menuid  = "{{$data['desiredMenu']->id}}";
        var n       = $('input[name="select-service[]"]:checked').length;
        var array   = $('input[name="select-service[]"]:checked');
        var ids     = [];

        if(n == 0){
            return false;
        }

        for(var i=0;i<n;i++){
            ids[i] =  array.eq(i).val();
        }

        if(ids.length == 0){
            return false;
        }

        $.ajax({
            type:"get",
            data: {menuid:menuid,ids:ids},
            url: "{{route($base_route.'service')}}",
            success:function(res){
                location.reload();
            }
        });
    });

    $("#add-custom-link").click(function(){
        var menuid  = "{{$data['desiredMenu']->id}}";
        var url = $('#borderInputURL').val();
        var url_text = $('#borderInputURLtext').val();

        if(url_text !== ''){
            $("#custom-name").hide();
        }else{
            $("#custom-name").show();
        }

        if(url !== ''){
            $("#custom-slug").hide();
            $.ajax({
                type:"get",
                data: {menuid:menuid,url:url,url_text:url_text},
                url: "{{route($base_route.'custom')}}",
                success:function(res){
                    location.reload();
                }
            });
        } else {
            $("#custom-slug").show();
        }
    });

    $('#saveMenu').click(function(){
        var menuid  = "{{$data['desiredMenu']->id}}";
        var location = $('input[name="location"]:checked').val();
        var title = $('input[id="edit-title"]').val();
        if(title == ""){
            Toastify({ newWindow: !0, text: "Please enter the title to save the menu !", gravity: 'top', position: 'center', stopOnFocus: !0, duration: 3000, close: "close",className: "bg-warning" }).showToast();
            return false;
        }
        if(location == null){
            Toastify({ newWindow: !0, text: "Please enter the location to save the menu !", gravity: 'top', position: 'center', stopOnFocus: !0, duration: 3000, close: "close",className: "bg-warning" }).showToast();
            return false;
        }
        var data = JSON.parse($("#serialize_output").text());
        $.ajax({
            type:"get",
            data: {menuid:menuid,data:data,location:location,title:title},
            url: "{{route($base_route.'updateMenu')}}",
            success:function(res){
                window.location.reload();
            }
        });
    });
    @endif

</script>
