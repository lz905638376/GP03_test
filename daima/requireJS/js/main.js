// 入口文件
// require([依赖模块列表],callback);
// requireJS中所有.js后缀的文件都可以省略.js
// 依赖列表中的模块和回调函数的形参一一对应
// require(['./js/module/module1','./js/module/module2','./js/lib/jquery-2.1.4'],function (m1,m2,$){
//     console.log( m1.name );
//     // m1.sayHi();
//     console.log( m2.abc );
//     $('.box').click(function (){// jQuery模块固定了模块名称
//         alert($(this).text());
//     })
// });

// require(['./js/module/module1','./js/module/module2'],function (m1,m2){
//     console.log( m1.name );
//     m1.show();
//     console.log(m2.abc);
// });


require.config({
    baseUrl: './js',
    paths: {
        'm1': 'module/module1',
        'm2': 'module/module2',
        'jquery': 'lib/jquery-2.1.4',
    }
})

require(['m1','m2','jquery'],function (m1,m2,$){
    console.log(m1);
    console.log(m2.abc);
    console.log($);
})

require(['m1'],function (m1){
    console.log(m1);
})
