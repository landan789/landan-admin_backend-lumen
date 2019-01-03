# Database Schema
1.  organizations, 组织 
    - name
    - domain
1.  departments, 部门
    - department_id
    - organization_id
    - name
    - roles ( 可考虑 BSON)
    - 技术部,产品部,市场部,运营部,财务部,超级部,人事部,总理部
1.  department_roles, 员工分类
    - department_id
    - department_role_id
    - name
    - 总监 GET, POST, PUT, DELETE
    - 经理 GET, POST, PUT
    - 组长 GET, POST
    - 职员 GET
1.  employees, 员工
   - employee_id
   - user_id
   - name
   - organization_ids
   - department_ids
   - department_role_id
   
1. organization_employee
   - organzation_id
   - employee_id
    
3.  users, 后台用户
    - name
    - email
4.  user_logins, 后台用户登入记录
    - user_login_id
    - user_id
    - ip
    - 分表

4.  members, 前台用户
4.  member_signins, 前台用户登入记录
    - member_sigin_id
    - member_id
    - ip
    - 分表
5.  member_transactions, 用户账变
    - 支付宝
    - 微信
    - 银行卡
    - 活动

5.  payment_categories, 支付类型
    - 支付宝
    - 微信
    - 银行卡
    
6.  payment_ways, 支付实际渠道
    - name
    - path (32 hash)
    - method (GET, POST, PUT, DELETE)
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
13. verifications, 验证
    - code
    - phone
    - ip
    - user_id
