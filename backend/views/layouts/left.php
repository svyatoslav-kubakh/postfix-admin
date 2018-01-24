<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Mailer', 'options' => ['class' => 'header']],
                    ['label' => 'Domains', 'icon' => 'bank', 'url' => ['/gii']],
                    ['label' => 'Accounts', 'icon' => 'address-card', 'url' => ['/debug']],
                    ['label' => 'Aliases', 'icon' => 'address-card-o', 'url' => ['/debug']],
                    ['label' => 'System', 'options' => ['class' => 'header']],
                    ['label' => 'Users', 'icon' => 'user-md', 'url' => ['/gii']],
                    ['label' => 'Logs', 'icon' => 'heartbeat', 'url' => ['/debug']],
                ],
            ]
        ) ?>

    </section>

</aside>
