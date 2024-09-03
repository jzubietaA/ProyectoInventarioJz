<section class="full-width header-well">
    <div class="full-width header-well-icon">
        <i class="zmdi zmdi-label"></i>
    </div>
    <div class="full-width header-well-text">
        <p class="text-condensedLight">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
        </p>
    </div>
</section>

<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
    <div class="mdl-tabs__tab-bar">
        <a href="#tabNewCategory" class="mdl-tabs__tab is-active">NEW</a>
        <a href="#tabListCategory" class="mdl-tabs__tab">LIST</a>
    </div>
    
    <!-- Tab para Agregar Categoría -->
    <div class="mdl-tabs__panel is-active" id="tabNewCategory">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <div class="full-width panel mdl-shadow--2dp">
                    <div class="full-width panel-title bg-primary text-center tittles">
                        New Category
                    </div>
                    <div class="full-width panel-content">
                        <form method="post" action="<?php echo site_url('producto/guardar_categoria'); ?>">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; DATA CATEGORY</legend><br>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="nombre" id="NameCategory" required>
                                        <label class="mdl-textfield__label" for="NameCategory">Name</label>
                                        <span class="mdl-textfield__error">Invalid name</span>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="descripcion" id="descriptionCategory">
                                        <label class="mdl-textfield__label" for="descriptionCategory">Description</label>
                                        <span class="mdl-textfield__error">Invalid description</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">
                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addCategory">
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                                <div class="mdl-tooltip" for="btn-addCategory">Add Category</div>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tab para Listar Categorías -->
    <div class="mdl-tabs__panel" id="tabListCategory">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col">
                <div class="full-width panel mdl-shadow--2dp">
                    <div class="full-width panel-title bg-success text-center tittles">
                        List Categories
                    </div>
                    <div class="full-width panel-content">
                        <form action="#">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                                <label class="mdl-button mdl-js-button mdl-button--icon" for="searchCategory">
                                    <i class="zmdi zmdi-search"></i>
                                </label>
                                <div class="mdl-textfield__expandable-holder">
                                    <input class="mdl-textfield__input" type="text" id="searchCategory">
                                    <label class="mdl-textfield__label"></label>
                                </div>
                            </div>
                        </form>
                        <div class="mdl-list">
                            <?php foreach ($categorias as $categoria): ?>
                                <div class="mdl-list__item mdl-list__item--two-line">
                                    <span class="mdl-list__item-primary-content">
                                        <i class="zmdi zmdi-label mdl-list__item-avatar"></i>
                                        <span><?php echo $categoria['nombre']; ?></span>
                                        <span class="mdl-list__item-sub-title"><?php echo $categoria['descripcion']; ?></span>
                                    </span>
                                    <a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
                                </div>
                                <li class="full-width divider-menu-h"></li>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

