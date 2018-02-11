<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Mailer', 'options' => ['class' => 'header']],
                    ['label' => 'Domains', 'icon' => 'bank', 'url' => ['/mailer-domains']],
                    ['label' => 'Accounts', 'icon' => 'address-card', 'url' => ['/mailer-accounts']],
                    ['label' => 'Aliases', 'icon' => 'address-card-o', 'url' => ['/mailer-aliases']],
                    ['label' => 'System', 'options' => ['class' => 'header']],
                    ['label' => 'Users', 'icon' => 'user-md', 'url' => ['/users']],
                    ['label' => 'Logs', 'icon' => 'heartbeat', 'url' => ['/logs']],
                ],
            ]
        ) ?>

    </section>

</aside>
