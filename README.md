# 教职员工管理系统 PHP-school-s-employee-management-system

## How to run
下载xampp，安装好，将htdoc替换掉，运行index即可

## 基本要求：
管理教职工的基本信息、教师业务档案、职工工资情况、部门信息等；
按照一定的条件，查询、统计符合条件的教师信息；至少应该包括每个教师详细信息的查询、按部门、职称、学历状况查询、按工作岗位查询统计；
对查询、统计的结果打印输出。

* 需求分析
*	数据库设计
*	完整性
*	安全性
*	视图的设计与使用
*	索引的使用
*	存储过程与触发器
*	系统功能的实现
*	用户界面友好型

## 数据库设计
本系统是针对学校人事工资管理编写的。在学校，一般管理者已经认识到计算机在管理过程中为可取代的作用，但是应用计算机来进行管理，他们还无法自己实现，这就需要有专门的管理软件来帮助实现。
建立高校教职工档案管理系统，采用计算机对高校教师档案进行管理，进一步提高办学效益和现代化水平。帮助各大中学校提高工作效率，实现高校教师档案管理工作流程的系统化、规范化和自动化，方便对教师的教学能力、业务能力、学术水平等的考核与评价。
系统需要完成的基本功能有信息的录入、修改、查询等功能，包括教师个人信息、主讲课程信息、薪资水平信息、部门岗位信息。同时系统要能够满足多种条件下的统计分析功能，对于特别的统计数据要采用图标的格式呈现给用户。要求采用数据库系统进行开发。
### 一、	业务流程图
![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/1.png)
### 二、	数据流图
![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/2.png)
### 三、	数据字典
#### 1.	数据项
```sql
编号{int,NOTNULL}
姓名{varchar(20),NOT NULL }
性别{enum(‘男’,’女’),NOT NULL }
年龄{int,NOTNULL }
课程{varchar(50),NOT NULL }
班级{varchar(50),NOT NULL }
开课时间{varchar(50),NOT NULL }
基本工资{int,NOTNULL }
奖金{int,NOTNULL }
实发工资{int,NOTNULL }
发工资日期{varchar(50),NOT NULL }
部门{varchar(20),NOT NULL }
职称{varchar(20),NOT NULL }
学历{varchar(20),NOT NULL }
岗位{varchar(20),NOT NULL }
用户名{char(16),NOT NULL}
密码{char(41),NOT NULL}
SELECT权限{enum(‘N’,’Y’),NOT NULL}
INSERT权限{enum(‘N’,’Y’),NOT NULL}
UPDATE权限{enum(‘N’,’Y’),NOT NULL}
DELETE权限{enum(‘N’,’Y’),NOT NULL}
```
#### 2.	数据结构
1)	教师表
名字:教师表
别名:
描述:记录教师信息的基本表
定义:教师表=编号+姓名+性别+年龄+课程+工资+部门+职称+学历+岗位
2)	用户权限表
名字:用户权限表
别名:
描述:记录用户的用户名密码及权限的基本表
定义:用户表=用户名+密码+SELECT权限+INSERT权限+UPDATE权限+DELETE权限
3)	授课表
名字:授课表
别名:
描述:记录教师授课情况的基本表
定义:授课表=课程+班级+教师编号+开课时间
4)	工资表
名字:工资表
别名:
描述:记录教师工资情况的基本表
定义:工资表=实发工资+基本工资+教师编号+奖金+发工资日期

### 四、	系统功能模块图
![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/3.png)

## 概念结构设计
### ER
![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/4.png)

## 逻辑结构设计
主要描述数据库的设计，给出具体的关系模式及关系图 
在概念结构设计阶段已经设计出系统的概念结构模型，画出E-R模型，在本阶段则将完成将实体和实体间的联系转换为关系模式，并确定这些关系的属性和码。
以下把E-R图转换成的具体的关系模型。主码用下划线表示。
1.	登录权限表(用户名,密码,SELECT权限,INSERT权限,UPDATE权限,DELETE权限)
2.	教师表(教师编号,姓名,性别,年龄,部门,职称,学历,岗位)
3.	授课表(课程,教师编号(外),班级,开课时间)
4.	工资表(教师编号(外),实发工资,基本工资,奖金,发工资日期)

## 系统功能的实现与界面友好型
### 1.进入系统
输入127.0.0.1进入本系统

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/5.png)

输入root/root以管理身份进入进入系统，这里有安全性的相关内容，会在安全性那章做详细介绍，界面如下

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/6.png)

本页面采用了框架式结构，由上方标题，左边菜单与中间显示区域构成首页插入了一个swf动画，显示当前时间，下面欢迎字也显示了当前用户的身份
### 2.查询操作
点击左侧的人员查询，会进入相应的查询页面

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/7.png)

核心代码

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/8.png)

$ss是针对左侧查询输入区域所做的条件语句，例如对查询

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/9.png)

我们得到左侧的结果，左边的查询是可以任意搭配的，因此可以实现绝大部分的查询要求右边我们采用了分页系统来实现对大量数据的处理，如下图

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/10.png)

同样，也可以进行部门查询和视图查询

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/11.png)

这两个查询是基于视图的，会在视图那一章进行详细介绍
### 3.添加，修改与删除

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/12.png)
点击添加，进入添加操作界面

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/13.png)

和查询界面类似，在左侧输入相关信息，点击插入

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/14.png)

可以看到陈丽丽相关的信息已经被插入到数据库中了修改操作，将陈丽丽的薪水修改成10000元，并且性别修改为男

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/15.png)

这里同样支持任意模式的修改，例如将所有教语文的人性别全部变成男

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/16.png)

到此为止程序的所有基本功能都实现了，总体来说，基于html+php的前端结构清晰明了，功能强大，较好的满足了题目的要求
## 安全性
安全性方面，我们建立了一个user表来对用户权限进行限制

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/17.png)

Root作为唯一的管理员，是可以进行管理员操作的平常用户的菜单是没有管理员这个选项的

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/18.png)

在管理员菜单里，我们可以对用户进行添加与权限调整，不具有某项权限的用户是无法进行相应的操作的，例如我们用用户wang进行登录,并修改1号姓名为白白白

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/19.png)

最后显示的结果

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/20.png)

我们用root管理员登录，修改wang的修改权限为Y

![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/21.png)

之后再次用wang登录修改，我们发现修改成功了
## 视图的使用
视图
部门信息
create view p1(part,max,min,avwage,sum)
as
selectpart,MAX(allwage),Min(allwage),AVG(allwage),count(*)
fromteacher,wwage
where teacher.id=wwage.id
group by part;

建立了部门的相关视图
![home](https://github.com/zzzyyyxxxmmm/PHP-school-s-employee-management-system/blob/master/photo/22.png)
说明：
视图建立的目的不单单是为了简化用户的操作，更应该让用户获得更多的信息，所以，我们运用聚集函数的知识建立了反映每个部门下对应的最大工资、最小工资、平均工资和总人数，让视图的使用更加灵活。
## 索引的使用
教职工编号ID上建立唯一升序索引：
1.教职工编号是主码，过创建唯一性索引，可以保证数据库表中每一行数据的唯一性；
2.一般而言数据量超过300的表需要建立索引，就教职工数据库管理的数据量而言500的数据量是完全可以达到的，大于300，所以建立索引是必要的；
3.可以大大加快数据的检索速度，这也是创建索引的最主要的原因；
4.可以加速表和表之间的连接，特别是在实现数据的参考完整性方面特别有意义
5.教职工编号是经常作为查询条件的字段，要建立索引。
Create unique index SID on teacher(id)
## 存储过程和触发器
### 1.	触发器
实发工资=基本工资+奖金
```sql
DELIMITER //
drop trigger if exists `t2` ;
create definer = `root`@`localhost` trigger `t2` before update on `wwage` 
for each row
begin
setnew.allwage=new.awage+new.bwage;
end //
DELIMITER ;

DELIMITER //
drop trigger if exists `t1` ;
create definer = `root`@`localhost` trigger `t1` before insert on `wwage` 
for each row
begin
setnew.allwage=new.awage+new.bwage;
end //
DELIMITER ;

```
说明：
由于需要计算出教职工最终的总工资（实发工资），那么就涉及到总工资的求和，我们设置这样的一个触发器，免去了人工计算实发工资并存入数据库的过程，使数据库的效率更高。

### 2.	存储过程
根据教职工编号和工资发放时间查询某个日期的工资情况
```sql
DELIMITER //
create procedure seep2(w  int,t varchar(50))
begin
selectteacher.id,name,allwage,wtime
fromteacher,wwage
where teacher.id=wwage.id
and teacher.id=w and wtime=t;
end //
DELIMITER ;
```
例：
call seep2(1,'2015/6/5');查询编号为1的教职工在2015/6/5的工资情况
说明：
在现实生活中，职工查询某个日期的工资是经常性的数据查询操作，教职工也不例外，因此面对这样的操作，我们可以设置一个存储过程，根据教职工编号和工资发放时间查询某个日期的工资情况，存储过程因为SQL语句已经预编绎过了，因此运行的速度比较快，降低了客户机与服务器间的通信量，是整个数据库系统效率更高。


