<div class="header">
  <div class="header-left">
    <button id="side-navigation-expand"><i class=" icon-white fa-solid fa-bars-staggered"></i> </button>
  </div>
  <div class="header-right">
    <a href="/fom/logout.php" class="btn-global text-white"><i
        class=" icon-white fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
  </div>

</div>
<div id="side-navigation">
  <div class="side-navigation-close-wrapper">
    <button id="side-navigation-close"><i class="icon-white fa fa-times" aria-hidden="true"></i></button>
  </div>
  <div class="menu-wrapper">
    <ul>
      <li><a href="/fom/dashboard" class="side-bar-navlink btn-global"><i class="fa-solid fa-gauge"></i> Dashboard</a>
      </li>
      <?php if (Session::has_permission('view-users') || Session::has_permission('add-users') || Session::has_permission('view-roles')) { ?>
        <li><a href="/fom/dashboard/users" class="side-bar-navlink btn-global"><i class="fa-solid fa-users"></i>Users</a>
          <ul class="sub-menu">
            <?php if (Session::has_permission('view-users')) { ?>
              <li><a href="/fom/dashboard/users" class="side-bar-navlink btn-global"><i
                    class="fa-solid fa-users-viewfinder"></i> View Users</a></li>
            <?php } ?>
            <?php if (Session::has_permission('add-users')) { ?>
              <li><a href="/fom/dashboard/users/add" class="side-bar-navlink btn-global"><i
                    class="fa-solid fa-user-plus"></i> Add User</a></li>
            <?php } ?>
            <?php if (Session::has_permission('view-roles')) { ?>
              <li><a href="/fom/dashboard/user_roles" class="side-bar-navlink btn-global"><i
                    class="fa-solid fa-user-plus"></i> User Roles</a></li>
            <?php } ?>
          </ul>
        </li>
      <?php } ?>
      <?php if (Session::has_permission('view-projects') || Session::has_permission('add-projects')) { ?>
        <li><a href="/fom/dashboard/projects" class="side-bar-navlink btn-global"><i
              class="fa-solid fa-diagram-project"></i> Projects</a>
          <ul class="sub-menu">
            <?php if (Session::has_permission('view-projects')) { ?>
              <li><a href="/fom/dashboard/projects" class="side-bar-navlink btn-global"><i
                    class="fa-solid fa-list-check"></i> View Projects</a></li>
            <?php } ?>
            <?php if (Session::has_permission('add-projects')) { ?>
              <li><a href="/fom/dashboard/projects/add" class="side-bar-navlink btn-global"><i
                    class="fa-solid fa-user-plus"></i> Add Project</a></li>
            <?php } ?>
          </ul>
        </li>
      <?php } ?>
      <?php if (Session::has_permission('transactions') || Session::has_permission('transactions')) { ?>
        <li><a href="/fom/dashboard/transactions" class="side-bar-navlink btn-global"><i
              class="fa-solid fa-diagram-project"></i> Transactions</a>
          <ul class="sub-menu">
            <?php if (Session::has_permission('withdrawal')) { ?>
              <li><a href="/fom/dashboard/withdrawal" class="side-bar-navlink btn-global"><i
                    class="fa-solid fa-list-check"></i> Withdrawal</a></li>
            <?php } ?>
            <?php if (Session::has_permission('add-invoices')) { ?>
              <li><a href="/fom/dashboard/invoice/add" class="side-bar-navlink btn-global"><i
                    class="fa-solid fa-user-plus"></i> Add Invoice</a></li>
            <?php } ?>
          </ul>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>