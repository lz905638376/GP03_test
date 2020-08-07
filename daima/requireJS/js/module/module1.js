// 定义模块
// define({
//     name: '无息',
//     sayHi: function (){
//         console.log('hi，大家好');
//     }
// });


// define(function (){
//     var name = 'xm';
//     var age = 28;
//     function show(){
//         console.log(age);
//     }
//     console.log('模块1的其他程序执行。。。');
//     return {
//         name: name,
//         show: show
//     }
// })


define(['m2'],function (m2){
    var name = 'xm';
    var age = 28;
    function show(){
        console.log(age);
    }
    console.log('模块1的其他程序执行。。。',m2.abc);
    return {
        name: name,
        show: show
    }
})

// 固定模块名称（官推不推荐使用）
// define('module1',['m2'],function (m2){
//     var name = 'xm';
//     var age = 28;
//     function show(){
//         console.log(age);
//     }
//     console.log('模块1的其他程序执行。。。',m2.abc);
//     return {
//         name: name,
//         show: show
//     }
// })


// var myModule = (function (){
//     var name = 'xm';
//     var age = 28;
//     function show(){
//         console.log(age);
//     }
//     return {
//         name: name,
//         show: show
//     }
// })();

