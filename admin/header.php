<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation" style="background-color:  #ffffff;">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?action=order">Home <span class="sr-only">(current)</span></a>
            </li>
            <style>
                .dropdown:hover>.dropdown-menu{
                    display: inline-block;
                }
            </style>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" >Categories</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown1">
                    <?php
                        include 'connect.php';

                        $sql = "SELECT categoryName FROM category";
                        $res = $connect->query($sql);
                        if (empty($res) or $res->num_rows > 0){
                            while ($row = $res->fetch_assoc()){
                                echo '<li class="dropdown-item" ><a href="?category='.$row['categoryName'].'">'.$row['categoryName'].'</a></li>';
                            }
                        }
                    ?>
                </ul>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?action=manage">Manage<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?action=addingFood">Add<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?action=orders">Orders<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?action=logout">Log out <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <?php
        include "action.php";
    ?>
</div>
<script>
    $(document).ready(function() {

        $('.navbar .dropdown-item').on('click', function(e) {
            var $el = $(this).children('.dropdown-toggle');
            var $parent = $el.offsetParent(".dropdown-menu");
            $(this).parent("li").toggleClass('open');

            if (!$parent.parent().hasClass('navbar-nav')) {
                if ($parent.hasClass('show')) {
                    $parent.removeClass('show');
                    $el.next().removeClass('show');
                    $el.next().css({
                        "top": -999,
                        "left": -999
                    });
                } else {
                    $parent.parent().find('.show').removeClass('show');
                    $parent.addClass('show');
                    $el.next().addClass('show');
                    $el.next().css({
                        "top": $el[0].offsetTop,
                        "left": $parent.outerWidth() - 4
                    });
                }
                e.preventDefault();
                e.stopPropagation();
            }
        });

        $('.navbar .dropdown').on('hidden.bs.dropdown', function() {
            $(this).find('li.dropdown').removeClass('show open');
            $(this).find('ul.dropdown-menu').removeClass('show open');
        });

    });
</script>