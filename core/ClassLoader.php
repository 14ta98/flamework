<?php
    class ClassLoader{
        protected $dirs;

        /**
         * PHPにオートローダクラスを登録する処理
         */
        public function register(){
            spl_autoload_register(array($this,'loadClass'));
        }

        /**
         * core/modelsディレクトリのクラスファイルを読み込み対象にする処理
         *
         * @param string $dir
         */
        public function registerDir($dir){
            $this->dirs[] = $dir;
        }

        /**
         * クラスファイルの読み込みを自動で行う処理
         */
        public function loadClass($class){
            foreach ($this->dirs as $dir){
                $file = $dir . ''. $class . '.php';
                require $file;

                return;
            }
        }
    }
}