define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'resumesend/index',
                    // add_url: 'resumesend/add',
                    // edit_url: 'resumesend/edit',
                    // del_url: 'resumesend/del',
                    // multi_url: 'resumesend/multi',
                    table: 'resume_send',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        // {field: 'id', title: __('Id')},
                        {field: 'user.nickname', title: '用户名'},
                        {field: 'company.name', title: __('Company.name')},
                        {field: 'company.image', title: __('Company.image'), formatter: Table.api.formatter.image},
                        {field: 'company.industry', title: __('Company.industry')},
                        {field: 'company.company_scale', title: __('Company.company_scale')},
                        {field: 'company.company_type', title: __('Company.company_type')},
                        // {field: 'user_id', title: __('User_id')},
                        // {field: 'position_id', title: __('Position_id')},
                        // {field: 'company_id', title: __('Company_id')},
                        // {field: 'user.id', title: __('User.id')},
                        // {field: 'user.group_id', title: __('User.group_id')},
                        // {field: 'user.username', title: __('User.username')},
                        // {field: 'user.password', title: __('User.password')},
                        // {field: 'user.salt', title: __('User.salt')},
                        // {field: 'user.email', title: __('User.email')},
                        // {field: 'user.mobile', title: __('User.mobile')},
                        // {field: 'user.avatar', title: __('User.avatar')},
                        // {field: 'user.level', title: __('User.level')},
                        // {field: 'user.gender', title: __('User.gender')},
                        // {field: 'user.birthday', title: __('User.birthday'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'user.bio', title: __('User.bio')},
                        // {field: 'user.money', title: __('User.money'), operate:'BETWEEN'},
                        // {field: 'user.score', title: __('User.score')},
                        // {field: 'user.successions', title: __('User.successions')},
                        // {field: 'user.maxsuccessions', title: __('User.maxsuccessions')},
                        // {field: 'user.prevtime', title: __('User.prevtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'user.logintime', title: __('User.logintime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'user.loginip', title: __('User.loginip')},
                        // {field: 'user.loginfailure', title: __('User.loginfailure')},
                        // {field: 'user.joinip', title: __('User.joinip')},
                        // {field: 'user.jointime', title: __('User.jointime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'user.createtime', title: __('User.createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'user.updatetime', title: __('User.updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'user.token', title: __('User.token')},
                        // {field: 'user.status', title: __('User.status'), formatter: Table.api.formatter.status},
                        // {field: 'user.verification', title: __('User.verification')},
                        // {field: 'position.id', title: __('Position.id')},
                        {field: 'position.title', title: __('Position.title')},
                        {field: 'position.salary_min', title: __('Position.salary_min')},
                        {field: 'position.salary_max', title: __('Position.salary_max')},
                        // {field: 'position.company_id', title: __('Position.company_id')},
                        {field: 'position.location', title: __('Position.location')},
                        {field: 'position.num', title: __('Position.num')},
                        {field: 'position.publish_time', title: __('Position.publish_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'position.industry', title: __('Position.industry'), operate:'FIND_IN_SET', formatter: Table.api.formatter.label},
                        // {field: 'position.type', title: __('Position.type')},
                        // {field: 'position.weigh', title: __('Position.weigh')},
                        // {field: 'position.create_time', title: __('Position.create_time'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'position.update_time', title: __('Position.update_time'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'company.id', title: __('Company.id')},
                        // {field: 'company.weigh', title: __('Company.weigh')},
                        // {field: 'company.create_time', title: __('Company.create_time'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'company.update_time', title: __('Company.update_time'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});