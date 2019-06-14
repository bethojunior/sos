<div class="no-print row">
    <div class="col l2 mainNav">
        <div class="profile">
            <label>Nome: </label><span id="nameProfile"></span>
            <br>
            <label>Email: </label><span id="emailProfile">joao@joao.com</span>
            <i title="Editar perfil" class="material-icons" id="editProfile">edit</i>
            <div class="divider"></div>
        </div>
        <ul>
            <li><i class="material-icons">home</i><a href="<?=Host::getLocal()?>dashboard/init">Inicio</a></li>
            <li><i class="material-icons">local_grocery_store</i><a href="<?=Host::getLocal()?>dashboard/sale">Vender</a></li>
            <li><i class="material-icons">move_to_inbox</i><a href="<?=Host::getLocal()?>dashboard/products">Produtos</a></li>
            <li><i class="material-icons">filter_list</i><a href="<?=Host::getLocal()?>dashboard/cashier">Caixa</a></li>
            <li id="logout"><i class="material-icons"></i>Sair</li>
        </ul>
    </div>
</div>