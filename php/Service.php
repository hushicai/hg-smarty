<?php
/**
 * @file 页面处理类
 * @author hushicai
 */


require_once(Conf::$smartyLibsDir . DIRECTORY_SEPARATOR . 'Smarty.class.php');

/**
 * 处理请求类 
 */
class Service {
    private $smarty;

    // 数据池
    // 所有向smarty assign的变量都会填充这个tplData中
    // 最后display时，把tplData赋给smarty
    private $tplData = array();

    /**
     * 构造函数
     *
     * @param  {array}  $config  要赋值的变量
     *
     * @param {array} $config['tplData'] 初始数据
     */
    public function __construct($config = array()) {
        $this->tplData = $config['tplData'];
        $this->init();
    }

    private function init() {
        $this->smarty = new Smarty();
        $this->smarty->compile_dir = Conf::$mockDir . DIRECTORY_SEPARATOR . 'templates_c';
        $this->smarty->template_dir = Conf::$tplDir;
        $this->smarty->left_delimiter = '{%';
        $this->smarty->right_delimiter = '%}';
    }

    /**
     * 设置一个smarty变量
     *
     * @param  {string} $key   参数数组或者参数名
     * @param  {string} $value 参数值
     * @return  {this}
     */
    public function assign($key, $value = '') {
        if (is_array($key)) {
            $this->tplData = array_merge($this->tplData, $key);
        }
        else if (!empty($key)){
            $this->tplData[$key] = $value;
        }

        return $this;
    }


    /**
     * 展示当前的模板
     *
     * @param  {string} $tplPath 相对于tplDir的模板路径
     */
    public function display($tplPath) {
        $this->smarty->assign('tplData', $this->tplData); 
        $this->smarty->display($tplPath);
    }
}
