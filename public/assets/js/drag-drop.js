var jQuery = jQuery.noConflict();
var DragAndDrop = (function (DragAndDrop) {
    function shouldAcceptDrop(item) {

        var $target = $(this).closest("li");
        var $item = item.closest("li");

        if ($.contains($item[0], $target[0])) {
            // can't drop on one of your children!
            return false;
        }

        return true;

    }

    function itemOver(event, ui) {
    }

    function itemOut(event, ui) {
    }

    function itemDropped(event, ui) {

        var $target = $(this).closest("li");
        var $item = ui.draggable.closest("li");
        console.log('target', $target.data('id'));
        console.log('item', $item.data('id'));

        var $srcUL = $item.parent("ul");
        var $dstUL = $target.children("ul").first();
        console.log('src-ul', $srcUL);
        console.log('dst-ul', $dstUL);

        // destination may not have a UL yet
        if ($dstUL.length == 0) {
            $dstUL = $("<ul></ul>");
            $target.append($dstUL);
        }

        $item.slideUp(50, function () {

            $dstUL.append($item);

            if ($srcUL.children("li").length == 0) {
                $srcUL.remove();
            }

            $item.slideDown(50, function () {
                $item.css('display', '');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "category/" + $item.data('id') + "/move",
                    data: {newParentId: $target.data('id')},
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                    }
                });
            });

        });

    }

    DragAndDrop.enable = function (selector) {

        jQuery(selector).find(".node-cpe").draggable({
            helper: "clone"
        });

        jQuery(selector).find(".node-cpe, .node-facility").droppable({
            activeClass: "active",
            hoverClass: "hover",
            accept: shouldAcceptDrop,
            over: itemOver,
            out: itemOut,
            drop: itemDropped,
            greedy: true,
            tolerance: "pointer"
        });

    };

    return DragAndDrop;

})(DragAndDrop || {});
(function ($) {
    $.fn.beginEditing = function (whenDone) {
        if (!whenDone) {
            whenDone = function () {
            };
        }
        var $node = this;
        var $editor = $("<input type='text' style='width:auto; min-width: 25px;'></input>");
        var currentValue = $node.text();

        function commit() {
            $editor.remove();
            $node.text($editor.val());
            var $li = $node.closest("li").data('id');
            whenDone($node);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });
            $.ajax({
                type: "POST", // Adjust the HTTP method as needed
                url: "category/" + $li + "/edit", // Replace with your actual controller URL
                data: {
                    newValue: $editor.val(),
                    id: $li
                }, // Include any data you need to send
                success: function (data) {
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.log(error)
                }
            });
        }

        function cancel() {
            $editor.remove();
            $node.text(currentValue);
            whenDone($node);
        }

        $editor.val(currentValue);
        $editor.blur(function () {
            commit();
        });
        $editor.keydown(function (event) {
            if (event.which == 27) {
                cancel();
                return false;
            } else if (event.which == 13) {
                commit();
                return false;
            }
        });
        $node.empty();
        $node.append($editor);
        $editor.focus();
        $editor.select();
    };
})(jQuery);
(function ($) {
    DragAndDrop.enable("#dragRoot");
    $(document).on("dblclick", "#dragRoot *[class*=node]", function () {
        $(this).beginEditing();
    });
})(jQuery);

(jQuery)(document).on('click', "a[data-id]", function (e) {
    e.preventDefault();
    const categoryID = $(this).data('id');
    console.log('categoryID',categoryID);
    console.log('categoryID-li',$('li[data-id="' + categoryID + '"]'));
    Swal.fire({
        title: 'Delete Category',
        text: 'Are you sure you want to delete this category?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    })
        .then((res) => {
            if (res.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'DELETE',
                    url: "category/" + categoryID + "/delete",
                    success: function (data) {
                        $('li[data-id="' + categoryID + '"]').remove();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Category successfully deleted',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                        Swal.fire('Error', 'An error occurred while deleting the category.', 'error');
                    }
                })
            }
        })
})
jQuery(document).on('submit', '#category-add', function(e) {
    e.preventDefault();
    let form = $(this);
    let formData = $(this).serialize();
    console.log(form);
    console.log(formData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:"POST",
        url:"category/save",
        data:formData,
        success:function(data){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: `${data.category} successfully created`,
                showConfirmButton: false,
                timer: 1500
            }).then(function(){
                window.location.reload();
            })
            console.log(data);
        },
        error:function(xhr,status,error){
            console.log(error);
        }
    })
});

