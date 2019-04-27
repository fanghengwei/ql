define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'position/index',
                    add_url: 'position/add',
                    edit_url: 'position/edit',
                    del_url: 'position/del',
                    multi_url: 'position/multi',
                    table: 'position',
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
                        {field: 'title', title: __('Title')},
                        {field: 'salary_min', title: __('Salary_min')},
                        {field: 'salary_max', title: __('Salary_max')},
                        {field: 'company_id', title: __('Company_id')},
                        {field: 'location', title: __('Location')},
                        {field: 'num', title: __('Num')},
                        {field: 'publish_time', title: __('Publish_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'industry', title: __('Industry'), searchList: {"不限":__('不限'),"计算机软件":__('计算机软件'),"互联网\/电子商务":__('互联网\/电子商务'),"电子\/微电子":__('电子\/微电子'),"通信\/(设备\/运营\/增值服务)":__('通信\/(设备\/运营\/增值服务)'),"广告\/会展\/公关":__('广告\/会展\/公关'),"房地产开发\/建筑与工程":__('房地产开发\/建筑与工程'),"物业管理\/商业中心":__('物业管理\/商业中心'),"家居\/室内设计\/装潢":__('家居\/室内设计\/装潢'),"中介服务(人才\/商标专利)":__('中介服务(人才\/商标专利)'),"专业服务(咨询\/财会\/法律等)":__('专业服务(咨询\/财会\/法律等)')}, operate:'FIND_IN_SET', formatter: Table.api.formatter.label},
                        {field: 'type', title: __('Type'), searchList: {"1":__('Type 1'),"2":__('Type 2')}, formatter: Table.api.formatter.normal},
                        {field: 'weigh', title: __('Weigh')},
                        {field: 'create_time', title: __('Create_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'update_time', title: __('Update_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'company.id', title: __('Company.id')},
                        {field: 'company.name', title: __('Company.name')},
                        {field: 'company.image', title: __('Company.image'), formatter: Table.api.formatter.image},
                        {field: 'company.industry', title: __('Company.industry')},
                        {field: 'company.company_scale', title: __('Company.company_scale')},
                        {field: 'company.company_type', title: __('Company.company_type')},
                        {field: 'company.weigh', title: __('Company.weigh')},
                        {field: 'company.create_time', title: __('Company.create_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'company.update_time', title: __('Company.update_time'), operate:'RANGE', addclass:'datetimerange'},
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