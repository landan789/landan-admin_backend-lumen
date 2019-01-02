# Database Schema
1.  departments, 部门
    - 技术部
    - 产品部
    - 市场部
    - 运营部
    - 财务部
    - 超级部
    - 人事部
    - 总理部
2.  employees, 员工
    - 总监
    - 经理
    - 组长
    - 职员
    
3.  users, 后台用户
4.  user_logins, 后台用户登入记录

4.  members, 前台用户
4.  member_signins, 前台用户登入记录
5.  member_transactions, 用户账变
    - 支付宝
    - 微信
    - 银行卡
    - 活动

5.  payment_categories, 支付类型
    - 支付宝
    - 微信
    - 银行卡
    
6.  payment_methods, 支付实际渠道
    - 八戒
    - 闪云
    
7.  payment_accounts, 支付账号

8.  activity_categories, 活动类型
    - 注册
    - 首充
9.  activities, 活动
10. activity_rewards, 活动奖励
11. activity_awarders, 获奖人记录 # 活动授奖部分可以 做成 事件方式，耦合性低

12. banners, 广告
