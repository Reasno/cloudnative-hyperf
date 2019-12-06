# 与官方骨架的区别
- 增加Kubernetes健康检查路由（具体内容仍需用户自主实现）
- 按照Docker容器习惯，将日志输出到stdout
- 在生产环境时输出JSON格式便于集成FluentBit、ELK等收集工具。
- 根据环境变量设置不同的日志等级
- 默认集成gRPC,Tracing和Metric组件
- 默认使用Base模式，只开启1进程。此模式可配合Kubernetes HPA实现进程级别的扩容与缩容。
- 由于上述原因，Metric组件默认不开启独立进程，直接从路由输出
- Worker终止时进行Timer清理，实现在Kubernetes下优雅退出
- Tracing默认使用Jaeger