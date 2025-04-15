
SecAdminApp = {
    Store: {
        init: function() {
            SecAdminApp.Store.set('credentials', [
                {email: 'pedro@email.com', password: '123456', username: 'Pedro B.', photoUrl: 'assets/img/user/pb.png', token: 'token1'},
                {email: 'joao@email.com', password: '123456', username: 'João Estéphano', photoUrl: 'assets/img/user/jsv.png', token: 'token2'},
                {email: 'andrews@email.com', password: '123456', username: 'Andews Chiozo', photoUrl: 'assets/img/user/user-13.jpg', token: 'token3'}
            ])

            if(!SecAdminApp.Store.get('Auth')) {
                SecAdminApp.Store.set('Auth', {
                    isAuth: false
                    ,user: {}
                    ,token: ''
                });
            }
        }
        ,get: function(key) {
            key = 'sec-admin-' + key;
            return JSON.parse(localStorage.getItem(key)) || localStorage.getItem(key);
        }
        ,set: function(key, value) {
            key = 'sec-admin-' + key;
            localStorage.setItem(key, JSON.stringify(value) || value);
        }
        ,remove: function(key) {
            key = 'sec-admin-' + key;
            localStorage.removeItem(key);
        }
        ,clear: function() {
            Object.keys(localStorage).filter(key => key.startsWith('sec-admin-')).forEach(key => localStorage.removeItem(key));
        }
    }
    ,init: function() {
        SecAdminApp.Store.init();
        
        // console.log('sec-admin.init');
        if(SecAdminApp.Store.get('Auth').isAuth) {
            SecAdminApp.loadComponent('layout/main', '#app');
            return;
        }
        this.loadComponent('login/index', '#app');
    }

    ,loadComponent(component, target = '#content') {
        $.get('./components/' + component + '.html', function(data) {
            $(target).html(data);
        })
    }
    ,registerMenuHandler() {
        $('body').on('click', '.sa-menu-link', function(e) {
            e.preventDefault();
            var component = $(this).attr('data-component');
            if(!component) return;
            SecAdminApp.loadComponent(component);
        });
    }
    ,login(credentials) {
        const user = SecAdminApp.Store.get('credentials').find(user => user.email == credentials.email && user.password == credentials.password);

        if(!user) {
            alert('Usuário ou senha inválidos');
            return;
        }
        
        delete user.password;
        delete user.token;
        SecAdminApp.Store.set('Auth', {isAuth: true, user, token: user.token});
        SecAdminApp.loadComponent('layout/main', '#app');
    }

    ,logout() {
        SecAdminApp.Store.clear();
        SecAdminApp.init();
    }
}

SecAdminApp.init()