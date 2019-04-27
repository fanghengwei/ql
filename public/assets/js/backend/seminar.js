define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'seminar/index',
                    add_url: 'seminar/add',
                    edit_url: 'seminar/edit',
                    del_url: 'seminar/del',
                    multi_url: 'seminar/multi',
                    table: 'seminar',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'weigh',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name')},
                        {field: 'school_id', title: __('School_id')},
                        {field: 'address', title: __('Address')},
                        {field: 'start_time', title: __('Start_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'end_time', title: __('End_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'weigh', title: __('Weigh')},
                        {field: 'create_time', title: __('Create_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'update_time', title: __('Update_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'school.id', title: __('School.id')},
                        {field: 'school.name', title: __('School.name')},
                        {field: 'school.image', title: __('School.image'), formatter: Table.api.formatter.image},
                        {field: 'school.weigh', title: __('School.weigh')},
                        {field: 'school.create_time', title: __('School.create_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'school.update_time', title: __('School.update_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
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