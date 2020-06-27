<template>
  <div class="bg">
      <div class="login-wrap">
        <h1>后台登录</h1>
          <el-form   :model="loginForm">
              <el-form-item label="账号">
                <el-input v-model="loginForm.account"></el-input>
              </el-form-item>
              <el-form-item label="密码">
                <el-input type="password" v-model="loginForm.password"></el-input>
              </el-form-item>

            <el-form-item>
              <el-button type="primary" @click="login">提交</el-button>
            </el-form-item>
          </el-form>
      </div>
  </div>
</template>

<script>
    export default {
        name: "Login",
        methods:{
            login() {
              // 1.发起请求获取公钥
              // 2.获取公钥后发起登录请求

              //发起请求获取公钥
              this.$axios({
                  url:'getPublicKey',
                  method:'GET',
              }).then(response => {
                  let publicKey = response.data.extra.publicKey;

                  let enPass = this.encryptData(publicKey,this.loginForm.password);
                  //发起登录请求
                  this.$axios({
                    url:'login',
                    method:'POST',
                    data: {
                      account: this.loginForm.account,
                      password: enPass
                    }
                  }).then(response => {
                    if (response.data.code == '000') {
                      this.$message.success(response.data.msg);
                    }else {
                      this.$message.error(response.data.msg);
                    }
                  }).catch((err) => {
                    this.$message.error('网络出小差!')
                });
              }).catch(err => {
                  this.$message.error('网络出小差!')
              });
            },


            // 加密方法
            encryptData(publicKey,data) {
              let encryptor = new JSEncrypt();

              encryptor.setPublicKey(publicKey);

              return encryptor.encrypt(data);
            }
        },
        data() {
          return {
            loginForm: {
              account:'',
              password:''
            },
          }
        }
    }
</script>

<style scoped>
    .bg {
        height:100%;
        background-color: #409EFF;

        /*使容器种的内容居中*/
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-wrap {
      height:500px;
      width:800px;
      background-color: white;
      border-radius: 13px;
      box-sizing: border-box;
      padding:120px 40px 10px 40px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04);
      position: relative;
    }

  .el-button {
    margin-top:20px;
    width:100%;
    float:right;
  }

  h1 {
    position: absolute;
    top:30px;
    left:30px;
  }
</style>
