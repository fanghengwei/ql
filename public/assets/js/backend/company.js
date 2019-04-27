define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'company/index',
                    add_url: 'company/add',
                    edit_url: 'company/edit',
                    del_url: 'company/del',
                    multi_url: 'company/multi',
                    table: 'company',
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
                        {field: 'image', title: __('Image'), formatter: Table.api.formatter.image},
                        {field: 'industry', title: __('Industry'), searchList: {"计算机软件":__('计算机软件'),"互联网\/电子商务":__('互联网\/电子商务'),"电子\/微电子":__('电子\/微电子'),"通信\/(设备\/运营\/增值服务)":__('通信\/(设备\/运营\/增值服务)'),"广告\/会展\/公关":__('广告\/会展\/公关'),"房地产开发\/建筑与工程":__('房地产开发\/建筑与工程'),"物业管理\/商业中心":__('物业管理\/商业中心'),"家居\/室内设计\/装潢":__('家居\/室内设计\/装潢'),"中介服务(人才\/商标专利)":__('中介服务(人才\/商标专利)'),"专业服务(咨询\/财会\/法律等)":__('专业服务(咨询\/财会\/法律等)')}, formatter: Table.api.formatter.normal},
                        {field: 'company_scale', title: __('Company_scale'), searchList: {"少于50人":__('少于50人'),"50-150人":__('50-150人'),"150-500人":__('150-500人'),"500-1000人":__('500-1000人'),"1000-5000人":__('1000-5000人'),"5000-10000人":__('5000-10000人'),"10000人以上":__('10000人以上')}, formatter: Table.api.formatter.normal},
                        {field: 'company_type', title: __('Company_type'), searchList: {"外资独企":__('外资独企'),"中外合资":__('中外合资'),"国有企业":__('国有企业'),"民营\/私营企业":__('民营\/私营企业'),"事业单位":__('事业单位'),"政府\/非盈利组织":__('政府\/非盈利组织'),"股份制企业":__('股份制企业')}, formatter: Table.api.formatter.normal},
                        {field: 'weigh', title: __('Weigh')},
                        {field: 'create_time', title: __('Create_time'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'update_time', title: __('Update_time'), operate:'RANGE', addclass:'datetimerange'},
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